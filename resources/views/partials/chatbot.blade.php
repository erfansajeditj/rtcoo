<div x-data="chatBot()" class="fixed bottom-6 right-6 z-50 font-sans" dir="ltr">
    
    <div x-show="isOpen" 
         x-transition:enter="transition ease-out duration-300 transform"
         x-transition:enter-start="opacity-0 translate-y-10 scale-95"
         x-transition:enter-end="opacity-100 translate-y-0 scale-100"
         x-transition:leave="transition ease-in duration-200 transform"
         x-transition:leave-start="opacity-100 translate-y-0 scale-100"
         x-transition:leave-end="opacity-0 translate-y-10 scale-95"
         class="bg-white w-80 sm:w-96 rounded-2xl shadow-2xl border border-gray-100 flex flex-col overflow-hidden mb-4 h-[500px] max-h-[80vh]"
         style="display: none;">
        
        <div class="bg-brand-teal text-white p-4 flex justify-between items-center shadow-md z-10">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-xl">🤖</div>
                <div>
                    <h3 class="font-bold text-lg leading-tight">Razi Teb Assistant</h3>
                    <span class="text-xs text-teal-100 flex items-center gap-1">
                        <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span> Online
                    </span>
                </div>
            </div>
            <button @click="isOpen = false" class="text-white hover:text-orange-200 transition-colors focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>

        <div class="flex-grow p-4 overflow-y-auto bg-gray-50 flex flex-col gap-3" id="chat-messages">
            <template x-for="(msg, index) in messages" :key="index">
                <div class="flex w-full" :class="msg.role === 'user' ? 'justify-end' : 'justify-start'">
                    <div class="max-w-[80%] rounded-2xl p-3 text-sm shadow-sm"
                         :class="msg.role === 'user' ? 'bg-brand-orange text-white rounded-br-none' : 'bg-white text-gray-800 border border-gray-100 rounded-bl-none'">
                        
                        <template x-if="msg.role === 'user'">
                            <p x-text="msg.text" class="leading-relaxed whitespace-pre-wrap"></p>
                        </template>

                        <template x-if="msg.role === 'bot'">
                            <div x-html="msg.text" class="leading-relaxed whitespace-pre-wrap"></div>
                        </template>

                    </div>
                </div>
            </template>

            <div x-show="isLoading" class="flex justify-start w-full">
                <div class="bg-white border border-gray-100 rounded-2xl rounded-bl-none p-4 shadow-sm flex gap-1 items-center">
                    <div class="w-2 h-2 bg-brand-teal rounded-full animate-bounce"></div>
                    <div class="w-2 h-2 bg-brand-teal rounded-full animate-bounce" style="animation-delay: 0.2s"></div>
                    <div class="w-2 h-2 bg-brand-teal rounded-full animate-bounce" style="animation-delay: 0.4s"></div>
                </div>
            </div>
        </div>

        <div class="p-3 bg-white border-t border-gray-100">
            <form @submit.prevent="sendMessage" class="flex gap-2">
                <input x-model="userInput" type="text" placeholder="Type your message..." 
                       class="flex-grow bg-gray-50 text-gray-900 border border-gray-200 rounded-xl px-4 py-2 text-sm focus:outline-none focus:border-brand-teal focus:ring-1 focus:ring-brand-teal transition-all"
                       :disabled="isLoading">
                <button type="submit" :disabled="isLoading || userInput.trim() === ''" 
                        class="bg-brand-teal text-white w-10 h-10 rounded-xl flex items-center justify-center hover:bg-teal-600 transition-colors disabled:opacity-50 disabled:cursor-not-allowed">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                </button>
            </form>
        </div>
    </div>

    <button @click="isOpen = !isOpen" x-show="!isOpen" x-transition.scale.origin.bottom
            class="w-16 h-16 bg-brand-orange text-white rounded-full shadow-xl flex items-center justify-center hover:scale-110 hover:bg-orange-600 transition-all duration-300 focus:outline-none">
        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
    </button>

</div>

<script>
    function chatBot() {
        return {
            isOpen: false,
            userInput: '',
            isLoading: false,
            messages: [
                { role: 'bot', text: 'Hello! I am the Razi Teb Smart Assistant. How can I help you today?' }
            ],
            
            async sendMessage() {
                if (this.userInput.trim() === '') return;
                
                let msg = this.userInput;
                this.messages.push({ role: 'user', text: msg });
                this.userInput = '';
                this.isLoading = true;
                
                this.scrollToBottom();

                try {
                    let response = await fetch('/chat/send', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({ message: msg })
                    });
                    
                    let data = await response.json();
                    
                    if(response.ok) {
                        this.messages.push({ role: 'bot', text: data.reply });
                    } else {
                        this.messages.push({ role: 'bot', text: 'Sorry, there was a server error.' });
                    }
                } catch (error) {
                    this.messages.push({ role: 'bot', text: 'Network error. Please check your internet connection.' });
                } finally {
                    this.isLoading = false;
                    this.scrollToBottom();
                }
            },
            
            scrollToBottom() {
                setTimeout(() => {
                    let container = document.getElementById('chat-messages');
                    if(container) container.scrollTop = container.scrollHeight;
                }, 100);
            }
        }
    }
</script>
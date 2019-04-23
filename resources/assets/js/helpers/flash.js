export default {
    state: {
        message: null,
        type: null
    },
    setMessage(message) {
        this.state.message = message
        setTimeout(() => {
                this.removeMessage()
                this.removeType()
        }, this.state.type == 'error' ? 6000 : 3000);
    },
    setType(type) {
        this.state.type = type
    },
    removeMessage() {
        this.state.message = null
    },
    removeType() {
        this.state.type = null
    }
}
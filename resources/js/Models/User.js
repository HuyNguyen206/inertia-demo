export default class User {
    constructor(attributes = {}) {
        Object.assign(this, attributes)
    }

    follow(user){

    }

    isUser(user){
        return this.id === user.id
    }
}

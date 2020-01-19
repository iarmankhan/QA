export default {
    modify (user, model) {
        return parseInt(user.id) === parseInt(model.user_id);
    },

    accept(user, answer) {
        return parseInt(user.id) === parseInt(answer.question.user_id);
    },

    deleteQuestion(user, question) {
        return user.id === parseInt(question.user_id) && parseInt(question.answers_count < 1)
    }
}

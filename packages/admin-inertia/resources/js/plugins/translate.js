export function translate(key = '', replace = [], locale) {
    return key;
}

export default {
    install: (app, options) => {
        app.config.globalProperties.__ = translate;
    }
}

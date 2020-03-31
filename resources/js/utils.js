import dateConvertor from 'ad-bs-converter'

export default {
    sleep (ms) {
        return new Promise(resolve => setTimeout(resolve, ms))
    },

    groupBy (xs, key) {
        return xs.reduce(function (rv, x) {
            (rv[x[key]] = rv[x[key]] || []).push(x)
            return rv
        }, {})
    },

    validateEmail (email) {
        let re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
        return re.test(String(email).toLowerCase())
    },

    dateWiseLock (date) {
        if (!date) return false
        let adVersion = BS2AD(date)
        return (new Date(adVersion)) < (new Date())
    },

    dateConversion (bsDOB) {
        if (bsDOB && bsDOB.length === 10) {
            console.log(bsDOB)
            let converted = dateConvertor.bs2ad(bsDOB)
            return converted.year + '-' + (converted.month.toString().length === 1 ? '0' + converted.month.toString() : converted.month.toString()) + '-' + (converted.day.toString().length === 1 ? '0' + converted.day.toString() : converted.day.toString())
        }
    }
}

import { CryptManager } from "./crypt/CryptManager.js"
const cryptManager = new CryptManager()
var currentFilePath = window.location.origin + "/progetti/volandia/engine/client/"
let countryList = []
const settings = {
    "async": true,
    "crossDomain": true,
    "url": "https://restcountries.com/v2/all",
    "method": "GET",
    "dataType": "json"
};
$.ajax(settings).done(function (response) {
    $.each(response, function(i, country) {
        countryList.push(country.translations.it.toLowerCase())
    });
});

$(()=>{

    $.getJSON(currentFilePath+"validatorJSON/passenger.json", (data) =>{
        localStorage.setItem("passenger", cryptManager.encrypt(JSON.stringify(data)))
    })

    //validazione codice fiscale
    $("#fc").on("input", (event)=>{
        let regex = new RegExp("^[A-Z]{6}[0-9]{2}[A-Z][0-9]{2}[A-Z][0-9]{3}[A-Z]{1}$|([0-9]{11})$") //validazione codice fiscale
        let input = $(event.target)

        input.val(input.val().toUpperCase())

        if(!regex.test(input.val())) input.setError()
        else input.setSuccess()
        
        if(input.val() === "") input.setDefault()
        checkValidate()
    })

    //validazione nome
    $("#name").on("input", (event) =>{
        let regex = new RegExp("^[a-zA-Z0-9\u00C0-\u00FF\s]+$")
        let input = $(event.target)
        let isValid = true

        input.val(input.val().capitalizeWord())

        for(let i of input.val().split(" "))
            if(!regex.test(i))
                isValid = false

        if(input.val().trim() === "" || !isValid) input.setError()
        else input.setSuccess()

        if(input.val() === "") input.setDefault()
        checkValidate()
    })

    //validazione cognome
    $("#surname").on("input", (event) =>{
        let regex = new RegExp("^[a-zA-Z0-9\u00C0-\u00FF\s]+$")
        let input = $(event.target)
        let isValid = true

        input.val(input.val().capitalizeWord())

        for(let i of input.val().split(" "))
            if(!regex.test(i))
                isValid = false

        if(input.val().trim() === "" || !isValid) input.setError()
        else input.setSuccess()

        if(input.val() === "") input.setDefault()
        checkValidate()
    })

    //validazione data di nascita
    $("#date").on("input", (event) =>{
        let input = $(event.target)
        let date = input.val().split("-")

        if(date[0] < 1907) input.setError()
        else input.setSuccess()
        if(input.val() === "") input.setDefault()
        checkValidate()
    })

    //validazione nazionalità
    $("#nationality").on("input", (event) =>{
        let input = $(event.target)
        if(!countryList.includes(input.val().toLowerCase())) input.setError()
        else input.setSuccess()
        if(input.val() === "") input.setDefault()
        checkValidate()
    })

    //validazione tipo di via
    $('#raute_type').on("input", (event) =>{
        let input = $(event.target)
        if(input.val() === "") input.setDefault()
        else input.setSuccess()
        checkValidate()
    })

    //validazione via
    $('#raute').on("input", (event) => {
        let regex = new RegExp("^[a-zA-Z0-9\u00C0-\u00FF\s]+$")
        let input = $(event.target)
        let isValid = true

        input.val(input.val().capitalizeWord())

        for(let i of input.val().split(" "))
            if(!regex.test(i))
                isValid = false

        if(input.val().trim() === "" || !isValid) input.setError()
        else input.setSuccess()

        if(input.val() === "") input.setDefault()
        checkValidate()
    })

    //validazione città
    $('#city').on("input", (event) => {
        let regex = new RegExp("^[a-zA-Z0-9\u00C0-\u00FF\s]+$")
        let input = $(event.target)
        let isValid = true

        input.val(input.val().capitalizeWord())

        for(let i of input.val().split(" "))
            if(!regex.test(i))
                isValid = false

        if(input.val().trim() === "" || !isValid) input.setError()
        else input.setSuccess()

        if(input.val() === "") input.setDefault()
        checkValidate()
    })

    //validazione housenumber
    $('#number').on("input", (event) =>{
        let regex = new RegExp("^[\\s\\d\\w]*$");
        let input = $(event.target)
    
        if(input.val().trim() === "" || !regex.test(input.val())) input.setError()
        else input.setSuccess()
    
        if(input.val() === "") input.setDefault()
        checkValidate()
    })

    //validazione email
    $("#email").on("input", (event) => {
        let input = $(event.target)
        
        if(!validator.isEmail(input.val())) input.setError()
        else input.setSuccess()

        if(input.val() === "") input.setDefault()
        checkValidate()
    }) 

    //validazione password  TODO
    $("#password").on("input", (event) => {
        let input = $(event.target);
        let errors = []
      
        if (input.val().length < 8) errors.push("La password deve contenere almeno 8 caratteri")
        
      
        if (!/[A-Z]/.test(input.val())) errors.push("La password deve contenere almeno una lettera maiuscola")
      
        if (!/[a-z]/.test(input.val())) errors.push("La password deve contenere almeno una lettera minuscola")
      
        if (!/\d/.test(input.val())) errors.push("La password deve contenere almeno un numero")
      
        if (!/[!@#$%^&*(),.?":{}|<>]/.test(input.val())) errors.push("La password deve contenere almeno un carattere speciale")
    
        if(errors.length != 0) input.setError()
        else input.setSuccess()

        if(input.val() === "") input.setDefault()
        checkValidate()
    })

    $("#register").on("click", (event)=>{
        if(!$("#register").prop("disabled"))
            localStorage.removeItem("passenger")
    })
})

let checkValidate = () =>{
    let json = JSON.parse(cryptManager.decrypt(localStorage.getItem("passenger")))
    let flag = true
    $.each(json, (i, data) =>{
        if(data != true) flag=false
    })
    if(flag) $("#register").setEnabled()
    else $("#register").setDisabled()
}

$.fn.setEnabled = function () {
    this.prop("disabled", false)
}

$.fn.setDisabled = function () {
    this.prop("disabled", true)
}

$.fn.setError = function(){
    this.css('background-color', '#ff000040')
    this.css('border', '1px solid #ff0000')
    let json = JSON.parse(cryptManager.decrypt(localStorage.getItem("passenger")))
    json[this.prop("id")] = false
    localStorage.setItem("passenger", cryptManager.encrypt(JSON.stringify(json)))
}

$.fn.setSuccess = function() {
    this.css('background-color','#00ff0040')
    this.css('border', '1px solid #00ff00')
    let json = JSON.parse(cryptManager.decrypt(localStorage.getItem("passenger")))
    json[this.prop("id")] = true
    localStorage.setItem("passenger", cryptManager.encrypt(JSON.stringify(json)))
}

$.fn.setDefault = function(){
    this.css('background-color', '#f3f4f6')
    this.css('border', '1px solid #f3f4f6')
    let json = JSON.parse(cryptManager.decrypt(localStorage.getItem("passenger")))
    json[this.prop("id")] = null
    localStorage.setItem("passenger", cryptManager.encrypt(JSON.stringify(json)))
}

Array.prototype.remove = function(value) {
    const index = this.findIndex(item => item.articleName === value.articleName);
    if (index !== -1) {
      this.splice(index, 1);
    }
};

String.prototype.capitalizeWord = function(){
    return this.split(' ').map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(' ');
}

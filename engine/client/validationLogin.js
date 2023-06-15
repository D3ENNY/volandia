import { CryptManager } from "./crypt/CryptManager.js"
var currentFilePath = window.location.origin + "/progetti/volandia/engine/client/"
const cryptManager = new CryptManager()
$(()=>{

    $.getJSON(currentFilePath+"validatorJSON/login.json", (data) =>{
        localStorage.setItem("login", cryptManager.encrypt(JSON.stringify(data)))
    })

    //validazione email
    $("#email").on("input", (event) => {
        let input = $(event.target)
        
        if(!validator.isEmail(input.val())) input.setError()
        else input.setSuccess()

        if(input.val() === "") input.setDefault()
        checkValidate()
        
    }) 
    //validazione password
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
    
    $("#login").on("click", (event)=>{
        if(!$("#login").prop("disabled"))
            localStorage.removeItem("login")
    })
}) 

let checkValidate = () =>{
    let json = JSON.parse(cryptManager.decrypt(localStorage.getItem("login")))
    let flag = true
    $.each(json, (i, data) =>{
        if(data != true) flag=false
    })
    if(flag) $("#login").setEnabled()
    else $("#login").setDisabled()
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
    let json = JSON.parse(cryptManager.decrypt(localStorage.getItem("login")))
    json[this.prop("id")] = false
    localStorage.setItem("login", cryptManager.encrypt(JSON.stringify(json)))
}

$.fn.setSuccess = function() {
    this.css('background-color','#00ff0040')
    this.css('border', '1px solid #00ff00')
    let json = JSON.parse(cryptManager.decrypt(localStorage.getItem("login")))
    json[this.prop("id")] = true
    localStorage.setItem("login", cryptManager.encrypt(JSON.stringify(json)))
}

$.fn.setDefault = function(){
    this.css('background-color', '#f3f4f6')
    this.css('border', '1px solid #f3f4f6')
    let json = JSON.parse(cryptManager.decrypt(localStorage.getItem("login")))
    json[this.prop("id")] = null
    localStorage.setItem("login", cryptManager.encrypt(JSON.stringify(json)))
}
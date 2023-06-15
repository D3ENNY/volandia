import { CryptManager } from "./crypt/CryptManager.js"
const cryptManager = new CryptManager()
var currentFilePath = window.location.origin + "/progetti/volandia/engine/client/"

$(()=>{

    $.getJSON(currentFilePath+"validatorJSON/editFly.json", (data) =>{
        localStorage.setItem("editFly", cryptManager.encrypt(JSON.stringify(data)))
    })

    //validazione numero volo
    $("#floating_number").on("input", (event) =>{
        let input = $(event.target)
        let regex = new RegExp("^[a-zA-Z0-9\u00C0-\u00FF\s]+$")
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

    //validazione origine
    $("#floating_origin").on("input", (event) =>{
        let input = $(event.target)
        let regex = new RegExp("^[a-zA-Z0-9\u00C0-\u00FF\s]+$")
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

        //validazione destinazione
        $("#floating_destination").on("input", (event) =>{
            let input = $(event.target)
            let regex = new RegExp("^[a-zA-Z0-9\u00C0-\u00FF\s]+$")
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
        
        //validazione data partenza
        $("#floating_departure_date").datepicker({
            dateFormat: 'dd-mm-yy',
            changeMonth: true,
            changeYear: true, 
            minDate: new Date(), // imposta la data minima a oggi
        }) 

        $("#floating_departure_date").on("blur change", (event) =>{
            let input = $(event.target)

            if(input.val() === "") input.setDefault()
            else input.setSuccess()
            checkValidate()
        })  

        $("#floating_departure_date").css("color-scheme", "dark")  

        //validazione data arrivo
        $("#floating_arrival_date").datepicker({
            dateFormat: 'dd-mm-yy',
            changeMonth: true,
            changeYear: true, 
            minDate: new Date(), // imposta la data minima a oggi
        })

        $("#floating_arrival_date").on("blur change", (event) =>{
            let input = $(event.target)
            console.log(input.val());
            if(input.val() === "") input.setDefault()
            else input.setSuccess()
            checkValidate()
        })  
             
        $("#floating_arrival_date").css("color-scheme", "dark")   

        //validazione capacità
        $("#floating_capacity").on("input", (event)=>{
            let input = $(event.target)
            let regex = new RegExp("\\d+")
            if(!regex.test(input.val())) input.setError()
            else input.setSuccess()

            if(input.val() === "") input.setDefault()
            checkValidate()
        })

        //validazione codice IATA
        $("#floating_code").on("input", (event)=>{
            let input = $(event.target)
            let regex = new RegExp("[A-Z]+")

            if(!regex.test(input.val())) input.setError()
            else input.setSuccess()
            
            if(input.val() === "") input.setDefault()
            checkValidate()
        })

        $("#editFly").on("click", (event)=>{
            if(!$("#editFly").prop("disabled"))
                localStorage.removeItem("editFly")
        })
})

let checkValidate = () =>{
    let json = JSON.parse(cryptManager.decrypt(localStorage.getItem("editFly")))
    let flag = true
    console.log(json);
    $.each(json, (i, data) =>{
        if(data != true) flag=false
    })
    if(flag) $("#editFly").setEnabled()
    else $("#editFly").setDisabled()
}

$.fn.setEnabled = function () {
    this.prop("disabled", false)
}

$.fn.setDisabled = function () {
    this.prop("disabled", true)
}

$.fn.setError = function(){
    this.css('background-color', '#ff000020')
    let json = JSON.parse(cryptManager.decrypt(localStorage.getItem("editFly")))
    json[this.prop("id")] = false
    localStorage.setItem("editFly", cryptManager.encrypt(JSON.stringify(json)))
}

$.fn.setSuccess = function() {
    this.css('background-color','#00ff0020')
    let json = JSON.parse(cryptManager.decrypt(localStorage.getItem("editFly")))
    json[this.prop("id")] = true
    localStorage.setItem("editFly", cryptManager.encrypt(JSON.stringify(json)))
}

$.fn.setDefault = function(){
    this.css('background-color', 'rgba(0,0,0,0)')
    let json = JSON.parse(cryptManager.decrypt(localStorage.getItem("editFly")))
    json[this.prop("id")] = null
    localStorage.setItem("editFly", cryptManager.encrypt(JSON.stringify(json)))
}

String.prototype.capitalizeWord = function(){
    return this.split(' ').map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(' ');
}

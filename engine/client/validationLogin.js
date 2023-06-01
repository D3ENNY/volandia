$(()=>{

    //validazione email
    $("#email").on("input", (event) => {
        let input = $(event.target)
        
        if(!validator.isEmail(input.val())) input.setError()
        else input.setSuccess()

        if(input.val() === "") input.setDefault()
        
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
    })




    $.fn.setEnabled = function () {
        this.prop("disabled", false)
    }
    
    $.fn.setDisabled = function () {
        this.prop("disabled", true)
    }
    
    $.fn.setError = function(){
        this.css('background-color', '#ff000040')
        this.css('border', '1px solid #ff0000')
        validated.remove(this.prop("id"))
    }
    
    $.fn.setSuccess = function() {
        this.css('background-color','#00ff0040')
        this.css('border', '1px solid #00ff00')
        validated.push(this.prop("id"))
    }
    
    $.fn.setDefault = function(){
        this.css('background-color', '#f3f4f6')
        this.css('border', '1px solid #f3f4f6')
        validated.remove(this.prop("id"))
    }
    
    Array.prototype.remove = function(value) {
        const index = this.findIndex(item => item.articleName === value.articleName);
        if (index !== -1) {
          this.splice(index, 1);
        }
    };   
    
})
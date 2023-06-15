$(()=>{
    $("#departureDate").datepicker({
        dateFormat: 'dd-mm-yy',
        changeMonth: true,
        changeYear: true, 
        minDate: new Date(), // imposta la data minima a oggi
    })

    $("#returnDate").datepicker({
        dateFormat: 'dd-mm-yy',
        changeMonth: true,
        changeYear: true, 
        minDate: new Date(), // imposta la data minima a oggi
    })
})
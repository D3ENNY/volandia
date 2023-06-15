export class CryptManager{

    constructor(){
        var currentFilePath = window.location.origin + "/progetti/volandia/engine/client/crypt/"
        $(()=>{
            $.getJSON(currentFilePath+"data.json", (data) =>{
                this.key = data.key
            })
        })
    }

    encrypt(text){
        // Converti la chiave in un oggetto WordArray
        let key = CryptoJS.enc.Utf8.parse(this.key);
        // Converti il messaggio in un oggetto WordArray
        let utf8text = CryptoJS.enc.Utf8.parse(text);
        //crypto
        let encrypted = CryptoJS.AES.encrypt(utf8text, key, {
            mode: CryptoJS.mode.ECB,
            padding: CryptoJS.pad.Pkcs7
        });
        return encrypted.toString()
    }

    decrypt(text){
        // Converti la chiave in un oggetto WordArray
        let key = CryptoJS.enc.Utf8.parse(this.key);
        // Decodifica il ciphertext da Base64
        let ciphertextBytes = CryptoJS.enc.Base64.parse(text);
        // Configura i parametri per la decrittazione
        var decryptOptions = {
            mode: CryptoJS.mode.ECB,
            padding: CryptoJS.pad.Pkcs7,
            iv: ''
        };
        // Decrittazione del ciphertext utilizzando la chiave
        var decrypted = CryptoJS.AES.decrypt(
            { ciphertext: ciphertextBytes },
            key,
            decryptOptions
        );
        // Restituisci il messaggio decrittato come stringa in Utf8
        return decrypted.toString(CryptoJS.enc.Utf8);
    }
}
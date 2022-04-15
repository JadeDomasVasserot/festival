var formdiv = document.getElementsByTagName('form');
var formdivclass = formdiv[0].getElementsByTagName('div');
for (var i = 0; i < formdivclass.length; i++){
    formdivclass[i].setAttribute('class','spacing')
}
var selectclass = document.getElementsByTagName('select');
for (var i = 0; i < selectclass.length; i++){
    selectclass[i].setAttribute('class',selectclass[i].getAttribute("class")+' input--style-4 select')
}

var entity = document.location.pathname
entity = entity.substring(1,entity.indexOf("/",1))
console.log(entity)
var entitysexe = document.getElementById(entity+'_sexe');
if (entitysexe) {
    entitysexe.innerHTML = '<div class="spacing"><label class="label radio-container">Homme <input type="radio" id="'+entity+'_sexe_0" name="'+entity+'[sexe]" required="required" value="Homme"><span class="checkmark"></span></label></div>'+
    '<div class="spacing"><label class="label radio-container">Femme <input type="radio" id="'+entity+'_sexe_1" name="'+entity+'[sexe]" required="required" value="Femme"><span class="checkmark"></span></label></div>'
}
 
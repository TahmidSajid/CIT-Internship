// Here goes your custom javascript
import data from './font.json' assert { type: 'json' }
console.log(data.Icons)
var icons = data.Icons ;
var icon_div = Array.from(document.querySelectorAll('.all-icons'));
var icon_input = Array.from(document.querySelectorAll('#icon-input'));
var icon_show = Array.from(document.querySelectorAll('#icon-show'));



icon_div.forEach((p,key)=>{
    icons.forEach((x)=>{
        var icn = document.createElement('i');
        p.appendChild(icn);
        icn.setAttribute('class',x);
        icn.classList.add("btn-icons")
        icn.addEventListener('click',function(){
            icon_input[key].setAttribute('value',x)
            icon_show[key].setAttribute('class',x)
            icn.classList.add('class','btn-animation')
            setTimeout(function(){
                icn.classList.remove('class','btn-animation')
            },800)
        });
    })
})




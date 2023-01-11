for (let i=1; i<23; i++){
var temp=document.getElementById(`${i}`).innerText;

if(temp=="occupied"){
    document.getElementById(`${i}`).style.backgroundColor="yellow";
}
else if(temp=="free"){
    document.getElementById(`${i}`).style.backgroundColor="green";
}
else if(temp=="busy"){
    document.getElementById(`${i}`).style.backgroundColor="red";
}
}

//Listeners

$("#btnOne").click(function(){
    go1(1);
});

$("#btnTwo").click(function(){
    go1(2);
});

$("#btnThree").click(function(){
    go1(3);
});

$("#btnSeven").click(function(){
    go2(7);
});

$("#btnEight").click(function(){
    go2(8);
});

$("#btnNine").click(function(){
    go2(9);
});

//Functions

function init(){
	btnGo = document.getElementById('btnGo');
	deselectAll();
}

function go1(num){
    var txtOneTitle = document.getElementById('txtOneTitle');
	
	
    if (num == 1) {
        txtOneTitle.innerHTML = 'Correct';
    } else {
        txtOneTitle.innerHTML = 'Incorrect';
    }
    
}

function go2(num){
    var txtTwoTitle = document.getElementById('txtTwoTitle');
	
    if (num == 7) {
        txtTwoTitle.innerHTML = 'Correct';
    } else {
        txtTwoTitle.innerHTML = 'Incorrect';
    }
}
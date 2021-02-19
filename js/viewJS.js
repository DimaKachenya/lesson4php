function displayMainCheckBox(){
    if(!this.checked){
        document.getElementById('select_all').checked=false;
    }
    if(checkAllCheckboxOnCheck()) {
        document.getElementById('select_all').checked=true;
    }
}

function checkAllCheckboxOnCheck() {
    let parentDOM = document.getElementById("root-id");
    let checkBoxes = parentDOM.getElementsByClassName("checkbox-input");
    let isCheck=true;
    for (let i = 0; i < checkBoxes.length; i++) {
        if (!checkBoxes[i].checked) {
            isCheck=false;
            break;
        }
    }
    return isCheck;
}

function selectAll() {
    let parentDOM = document.getElementById("root-id");
    let mainCheckBox = document.getElementById("select_all");
    if(mainCheckBox.checked) {
        let checkBoxes = parentDOM.getElementsByClassName("checkbox-input");//test is not target element
        checkAll(checkBoxes);
    }else{
        let checkBoxes = parentDOM.getElementsByClassName("checkbox-input");//test is not target element
        uncheckAll(checkBoxes);
    }
}

function checkAll(checkBoxes){
    for (let i = 0; i < checkBoxes.length; i++) {
        if (!checkBoxes[i].checked) {
            checkBoxes[i].checked = true;
        }
    }
}
function uncheckAll(checkBoxes){
    for (let i = 0; i < checkBoxes.length; i++) {
        if (checkBoxes[i].checked) {
            checkBoxes[i].checked = false;
        }
    }
}
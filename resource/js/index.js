const $ojito = document.getElementById('ojito');
const $pass = document.getElementById('pass');
$ojito.addEventListener('click',() =>{
    if ($pass.type == 'password') {
        $pass.type = 'text';
        $ojito.textContent = '🙈';
    }else{
        $pass.type = 'password';
        $ojito.textContent = '👀';
    }
});
        /*===== LOGIN SHOW and HIDDEN =====*/
        const signUp = document.getElementById('sign-up'),
        signIn = document.getElementById('sign-in'),
        loginIn = document.getElementById('login-in'),
        loginUp = document.getElementById('login-up')
    
    
    signUp.addEventListener('click', ()=>{
        // Remove classes first if they exist
        loginIn.classList.remove('block')
        loginUp.classList.remove('none')
    
        // Add classes
        loginIn.classList.toggle('none')
        loginUp.classList.toggle('block')
    })
    
    signIn.addEventListener('click', ()=>{
        // Remove classes first if they exist
        loginIn.classList.remove('none')
        loginUp.classList.remove('block')
    
        // Add classes
        loginIn.classList.toggle('block')
        loginUp.classList.toggle('none')
    })
    function check() {
            alert("click!");
    }
    
    
    let signin_form = document.querySelector('#signin-form')
    
        let signin_btn = document.querySelector('#signin-btn')
    
        // validateEmail = (email) => {
        //     const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
    
        //     return re.test(String(email).toLowerCase())
        // }
    
        checkSigninInput = (input) => {
        let err_span = signin_form.querySelector(`span[data-err-for="${input.id}"]`)
        let val = input.value.trim()
        let form_group = input.parentElement
    
        switch(input.getAttribute('type')) {
            case 'password':
                if (val.length < 6) {
                    form_group.classList.add('err')
                    form_group.classList.remove('success')
                    err_span.innerHTML = 'Mật khẩu chứa 6 ký tự trở lên'
                } else {
                    form_group.classList.add('success')
                    form_group.classList.remove('err')
                    err_span.innerHTML = ''
                }
                break;
            case 'user':
                if (val.length === 0 ) {
                    form_group.classList.add('err')
                    form_group.classList.remove('success')
                    err_span.innerHTML = 'Vui lòng nhập tên đăng nhập'
                } else {
                    form_group.classList.add('success')
                    form_group.classList.remove('err')
                    err_span.innerHTML = ''
                }
        }
        }
    
        checkSigninForm = () => {
            let inputs = signin_form.querySelectorAll('.form-input')
            inputs.forEach(input => checkSigninInput(input))
            }
    
        signin_btn.onclick = () => {
            checkSigninForm()
        }
    
        let inputs = signin_form.querySelectorAll('.form-input')
        inputs.forEach(input => {
            input.addEventListener('focusout', () => {
                checkSigninInput(input)
            })
        })
    
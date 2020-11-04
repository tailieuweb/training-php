function mo_edit(){
    document.getElementById("top_modal").style.display ="block";
}
function modal_close(){
    document.getElementById("top_modal").style.display = "none";
}
const new_pass = document.querySelector('.add_user');
		const new_pass = document.querySelector('#new-pass');
		const form_edit = document.querySelector('.form-edit');
		const btn_back = document.querySelector('.btn-back');
		const password_1 = document.querySelector('#password-1');
		const password_2 = document.querySelector('#password-2');
		const btn_save = document.querySelector('.btn-save');
		const form = document.querySelector('form');

		new_pass.onclick = () => {
			form_edit.style.display = 'inline-block';
		}
		btn_back.onclick = () => {
			form_edit.style.display = 'none';
		}

		password_1.pattern = '[a-zA-Z0-9]{6,}';

		btn_save.onclick = () => {
			if (password_1.value != password_2.value) {
				return false;
			}
		}
		form.onsubmit = (e) => {


			if (form.checkValidity() === false) {
				e.preventDefault();
				
			}
			form.classList.add('was-validated');
			
		};
class Form {
    constructor(formSelector) {
      console.log("Constructor Called")
      this.form = document.querySelector(formSelector);
      this.name = document.querySelector('#name');
      this.email = document.querySelector('#email');
      this.mobileNumber = document.querySelector('#mobileNumber');
      this.address = document.querySelector('#address');
      this.password = document.querySelector('#password');
      this.confirmPassword = document.querySelector('#confirm-password');
      this.gender = document.querySelector('input[name="gender"]:checked');
      this.form.addEventListener('submit', this.onSubmit.bind(this));
    }
    
    onSubmit(event) {
      event.preventDefault();
      
      if (this.validate()) {
        console.log("going good")
        this.createAccount();
        this.form.reset();
      }else{
        alert('Cannot validate');
        console.log("Not going good")
      }
    }
    
    validate() {
      if (this.name.value.trim() === '') {
        alert('Please enter your name');
        console.log("name problem")
        return false;
      }
      if (this.address.value.trim() === '') {
        alert('Please enter your address');
        console.log("address problem")
        return false;
      }
      if (this.mobile.value.trim() === '') {
        alert('Please enter your mobile number');
        console.log("mobile no problem")
        return false;
      }
      // if (!/^[0-9]{10}$/.test(this.mobile.value)) {
      //   alert('Please enter a valid 10-digit mobile number');
      //   console.log("mobile no problem")
      //   return false;
      // }
      if (this.email.value.trim() === '') {
        alert('Please enter your email');
        console.log("email problem")
        return false;
      }
      // if (!/\S+@\S+\.\S+/.test(this.email.value)) {
      //   alert('Please enter a valid email address');
      //   console.log("email problem")
      //   return false;
      // }
      if (this.password.value.trim() === '') {
        alert('Please enter your password');
        console.log("password problem")
        return false;
      }
      if (this.confirmPassword.value.trim() === '') {
        alert('Please confirm your password');
        console.log("confirm password problem")
        return false;
      }
      if (this.password.value !== this.confirmPassword.value) {
        alert('Passwords do not match');
        console.log("password not matched problem")
        return false;
      }
      alert("Done");
      return true;
    }
    createAccount() {
        const name = this.name.value;
        const address = this.address.value;
        const mobile = this.mobile.value;
        const email = this.email.value;
        const gender = this.gender.value;
        const password = this.password.value;
      
        const url = 'RegisterUser.php';
        const data = new FormData();
        data.append('name', name);
        data.append('address', address);
        data.append('mobile', mobile);
        data.append('email', email);
        data.append('gender', gender);
        data.append('password', password);
      
        fetch(url, {
          method: 'POST',
          body: data
        })
        .then(response => {
          if (response.ok) {
            alert('Account created successfully!');
            this.form.reset();
          } else {
            alert('Error creating account');
          }
        })
        .catch(error => {
          console.error(error);
          alert('Error creating account');
        });
      
    }}   
  const form = new Form('form');
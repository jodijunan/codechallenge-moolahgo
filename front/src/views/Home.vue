<template>
  <div class="" style="padding-top:30px;">
				<form class="needs-validation" novalidate="">
					<div class="row g-3">
						<div class="col-12">
							<label for="username" class="form-label">Please input referral code</label>
							<div class="input-group has-validation">
								<input type="text" class="form-control" 
									v-model="referralcode"
									v-on:keypress="validateCode($event)"
									v-on:keyup="validateLength($event)"
									@blur="validateLength($event)"
									maxlength="6"
									@input="referralcode = $event.target.value.toUpperCase()"
									placeholder="referral code" required="">
							</div>
						</div>
					</div>
					<br>
					<button @click.prevent="send" :disabled="btndisabled" 
					class="w-100 btn btn-primary btn-lg" type="submit"> 
						<span v-if="isLoading" class="spinner-border spinner-border-sm" 
							role="status" aria-hidden="true"></span>
						<span v-if="isLoading">&nbsp;Loading...</span>
						<span v-else>Send</span>
					</button>
				</form>
				<br><br>
				<table v-if="hasresult && user!=null" class="table table-hover" style="text-align:left;">
					<tbody>
					<tr>
						<td><b>Name</b></td>
						<td>: {{user.name}}</td>
					</tr>
					<tr>
						<td><b>Email</b></td>
						<td>: {{user.email}}</td>
					</tr>
					<tr>
						<td><b>Referral code</b></td>
						<td>: {{user.referral_code}}</td>
					</tr>
					</tbody>
				</table>
				<table v-else-if="hasresult && user==null">
					<tr>
						<td colspan="2">Data not found</td>
					</tr>
				</table>
			</div>
</template>

<script>
import axios from 'axios';
export default {
	name: 'Home',
	data() {
		return {
			hasresult:false,
			isLoading : false,
			referralcode:null,
			btndisabled:true, user:null
		}
	},	
	methods: {
		send(){
			this.btndisabled = true;
			this.isLoading = true;
			const {referralcode} = this;

			axios.post('http://localhost:7000/process', {
                    referralcode
                }, {
                    headers:''
                })
                .then(
                    res => {
                        this.isLoading = false;
						this.hasresult = true;
						this.btndisabled = false;
						
						this.user = res.data.data;
						
                    }
                )
                .catch(err => console.log(err));

		},
		validateCode(e) {
			let char = String.fromCharCode(e.keyCode); 
			this.hasresult = false;
			if (/^([A-Z0-9]+)$/.test(char)) {
				return true;
			}
			else e.preventDefault();
			
		},
		validateLength(e){
			if (e.target.value.length == 6) {
				let char = e.target.value; 
				if (/^([a-zA-Z0-9]+)$/.test(char)) {
					// return true;
					this.btndisabled = false;
				} else {
					this.btndisabled = true;	
				}	
				
			} else {
				this.btndisabled = true;
			}
		}
	},
}
</script>

<template>
  <div class="about">
    <h3>Create user</h3>
	<button @click.prevent="seed" :disabled="btndisabled" 
		class="w-100 btn btn-primary btn-lg" type="button"> 
		<span v-if="isLoading" class="spinner-border spinner-border-sm" 
			role="status" aria-hidden="true"></span>
			<span v-if="isLoading">&nbsp;Loading...</span>
			<span v-else>Create</span>
	</button>

	<div v-if="isLoading" class="d-flex justify-content-center">
		<div class="spinner-border" role="status">
			<span class="visually-hidden">Loading...</span>
		</div>
	</div>
	<table v-if="user!=null && !isLoading" class="table table-hover" style="text-align:left;">
		<thead>
			<tr>
				<th>No</th>
				<th>Name</th>
			</tr>
		</thead>
		<tbody>
			<tr v-for="cd in user" :key="cd.id">
				<td>{{cd.id}}</td>
				<td>{{cd.name}}</td>
			</tr>
		</tbody>
		
	</table>
	<table v-else-if="user==null && !isLoading" class="d-flex justify-content-center">
		<tr>
			<td>Data not found</td>
		</tr>
	</table>
  </div>
</template>
<script>
import axios from 'axios';

export default {
	name:'Seed',
	data() {
		return {
			user:null,
			isLoading:false
		}
	},
	methods: {
		seed() {
			this.isLoading = true;

			axios.post('http://localhost:7000/seed', {
                    headers:''
                })
                .then(
                    res => {
                        this.isLoading = false;
						
						this.user = res.data.data;
						
                    }
                )
                .catch(err => console.log(err));
		}
	},
	mounted() {
		this.isLoading = true;
		axios.get('http://localhost:7000/userlist', 
			{
				headers:''
            })
            .then(
                    res => {
                        this.isLoading = false;
						// this.hasresult = true;
						// console.log(res.data.data)
						this.user = res.data.data;
						
                    }
                )
                .catch(err => console.log(err));
			},
}
</script>
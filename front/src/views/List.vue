<template>
  <div class="about">
    <h3>List of referral code</h3>
	<div v-if="isLoading" class="d-flex justify-content-center">
		<div class="spinner-border" role="status">
			<span class="visually-hidden">Loading...</span>
		</div>
	</div>
	<table v-if="code!=null && !isLoading" class="table table-hover" style="text-align:left;">
		<thead>
			<tr>
				<th>No</th>
				<th>Referral Code</th>
			</tr>
		</thead>
		<tbody>
			<tr v-for="cd in code" :key="cd.id">
				<td>{{cd.id}}</td>
				<td>{{cd.code}}</td>
			</tr>
		</tbody>
		
	</table>
	<table v-else-if="code==null && !isLoading" class="d-flex justify-content-center">
		<tr>
			<td>Data not found</td>
		</tr>
	</table>
  </div>
</template>
<script>
import axios from 'axios';

export default {
	name:'List',
	data() {
		return {
			code:null,
			isLoading:false
		}
	},
	mounted() {
		this.isLoading = true;
		axios.get('http://localhost:7000/list', 
			{
				headers:''
            })
            .then(
                    res => {
                        this.isLoading = false;
						// this.hasresult = true;
						// console.log(res.data.data)
						this.code = res.data.data;
						
                    }
                )
                .catch(err => console.log(err));
			},
}
</script>
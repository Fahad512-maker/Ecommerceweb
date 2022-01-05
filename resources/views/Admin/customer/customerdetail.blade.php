<table class="table table-bordered table-striped">
<thead>
<th>Mobile Number</th>
<th>Address</th>
<th>City</th>
<th>State</th>
<th>zip code</th>
</thead>
<tbody>
<tr>
<td>{{ $customer->mobile_number }}</td>
<td>{{ $customer->address }}</td>
<td>{{ $customer->city }}</td>
<td>{{ $customer->state }}</td>
<td>{{ $customer->zip_code }}</td>
</tr>
</tbody>
</table>
@extends('agent.agent_dashboard')
@section('agent')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="page-content">

        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Property Deatils</h6>
                        <p class="text-muted mb-3">Add class <code>.table</code></p>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <th>Property Name</th>
                                        <td><code>{{ $property->property_name }}</code></td>
                                    </tr>
                                    <tr>
                                        <th>Property Status</th>
                                        <td><code>{{ $property->property_status }}</code></td>
                                    </tr>
                                    <tr>
                                        <th>Lowest Price</th>
                                        <td><code>{{ $property->lowest_price }}</code></td>
                                    </tr>
                                    <tr>
                                        <th>Maximum Price</th>
                                        <td><code>{{ $property->max_price }}</code></td>
                                    </tr>
                                    <tr>
                                        <th>Bedrooms</th>
                                        <td><code>{{ $property->bedrooms }}</code></td>
                                    </tr>
                                    <tr>
                                        <th>Bathrooms</th>
                                        <td><code>{{ $property->bathrooms }}</code></td>
                                    </tr>
                                    <tr>
                                        <th>Garage</th>
                                        <td><code>{{ $property->garage }}</code></td>
                                    </tr>
                                    <tr>
                                        <th>Garage Size</th>
                                        <td><code>{{ $property->garage_size }}</code></td>
                                    </tr>
                                    <tr>
                                        <th>Address</th>
                                        <td><code>{{ $property->address }}</code></td>
                                    </tr>
                                    <tr>
                                        <th>City</th>
                                        <td><code>{{ $property->city }}</code></td>
                                    </tr>
                                    <tr>
                                        <th>State</th>
                                        <td><code>{{ $property->state }}</code></td>
                                    </tr>
                                    <tr>
                                        <th>Postal Code</th>
                                        <td><code>{{ $property->postal_code }}</code></td>
                                    </tr>
                                    <tr>
                                        <th>Main Image</th>
                                        <td>
                                            <img src="{{ asset($property->property_thumbnail) }}" alt="Property Image"
                                                style="width: 100px; height:100px;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Property Status</th>
                                        <td>
                                            @if ($property->status == 1)
                                                <span class="badge rounded-pill bg-success">Active</span>
                                            @else
                                                <span class="badge rounded-pill bg-danger">Inactive</span>
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Hoverable Table</h6>
                        <p class="text-muted mb-3">Add class <code>.table-hover</code></p>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <th>Property Code</th>
                                        <td><code>{{ $property->property_code }}</code></td>
                                    </tr>
                                    <tr>
                                        <th>Property Size</th>
                                        <td><code>{{ $property->property_size }}</code></td>
                                    </tr>
                                    <tr>
                                        <th>Property Video</th>
                                        <td><code>{{ $property->property_video }}</code></td>
                                    </tr>
                                    <tr>
                                        <th>Neighbourhood</th>
                                        <td><code>{{ $property->neighborhood }}</code></td>
                                    </tr>
                                    <tr>
                                        <th>Latitude</th>
                                        <td><code>{{ $property->latitude }}</code></td>
                                    </tr>
                                    <tr>
                                        <th>Longitude</th>
                                        <td><code>{{ $property->longitude }}</code></td>
                                    </tr>
                                    <tr>
                                        <th>Property Type</th>
                                        <td><code>{{ $property['type']['type_name'] }}</code></td>
                                    </tr>
                                    <tr>
                                        <th>Agent</th>
                                        <td>
                                            @if ($property->agent_id == null)
                                                <code>Admin</code>
                                            @else
                                                <code>{{ $property['user']['name'] }}</code>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Property Amenities</th>
                                        <td>
                                            <code>
                                                <select name="amenities_id[]" class="js-example-basic-multiple form-select"
                                                    multiple="multiple" data-width="100%" id="exampleFormControlSelect1">

                                                    @foreach ($amenities as $ameni)
                                                        <option value="{{ $ameni->id }}"
                                                            {{ in_array($ameni->id, $property_ami) ? 'selected' : '' }}>
                                                            {{ $ameni->amenities_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </code>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

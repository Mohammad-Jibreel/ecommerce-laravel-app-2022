@extends('dashboard')
@section('content')
 <div class="container">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">address line 1</th>
            <th scope="col">address line 2</th>
            <th scope="col">city</th>
            <th scope="col">state</th>
            <th scope="col">country</th>
            <th scope="col">postal code</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($userAddresses as $address )
            <tr>

                <th>{{ $address->id }}</th>
                <td>{{ $address->address_line_1 }}</td>
                <td>{{ $address->address_line_2 }}</td>
                <td>{{ $address->city }}</td>
                <td>{{ $address->state }}</td>
                <td>{{ $address->country }}</td>
                <td>{{ $address->postal_code }}</td>

              </tr>

            @endforeach

        </tbody>
      </table>

 </div>

@endsection

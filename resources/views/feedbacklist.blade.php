<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Feedback Data Interface</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-4">
  <h2>Feedback Data</h2>
  <a href="/member/add" class="btn btn-primary">go to servay form</a>
  <div class="table-responsive">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Age</th>
          <th>Feedback</th>
          <th>Rate</th>
        </tr>
      </thead>

      <tbody id="feedbackTableBody">
        @foreach ($members as $member)
            <tr>
                <td>{{ $member->name }}</td>
                <td>{{ $member->email }}</td>
                <td>{{ $member->age }}</td>
                <td>{{ $member->feedback }}</td>
                <td>{{ $member->rate }}</td>
            </tr>
        @endforeach
        
      </tbody>
    </table>
  </div>
</div>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Survey Form</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    /* Add any custom styles here */
    /* For example, adjusting spacing or colors */
    .survey-form {
      max-width: 600px;
      margin: auto;
      padding: 20px;
    }
    /* You can customize further as needed */
  </style>
</head>
<body>

<div class="container">
  <x-message  />
  <form action="/member"  class="survey-form" method="POST">
    @csrf
    <h2 class="mb-4">Survey Form</h2>
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" name="name" placeholder="Enter your name" >
      @error('name')
        <p style='color:red'>{{ $message }}</p>
      @enderror
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" name="email" placeholder="Enter your email" >
      @error('email')
        <p style='color:red'>{{ $message }}</p>
      @enderror
    </div>
    <div class="form-group">
      <label for="age">Age:</label>
      <input type="number" class="form-control" name="age" placeholder="Enter your age" >
      @error('age')
        <p style='color:red'>{{ $message }}</p>
      @enderror
    </div>
    <div class="form-group">
      <label for="feedback">Feedback:</label>
      <textarea class="form-control" name="feedback" rows="5" placeholder="Enter your feedback"></textarea>
      @error('feedback')
        <p style='color:red'>{{ $message }}</p>
      @enderror
    </div>
    <div class="form-group">
      <label for="rating">Rate your experience:</label>
      <select class="form-control" name="rate">
        <option value="excellent">Excellent</option>
        <option value="good">Good</option>
        <option value="average">Average</option>
        <option value="poor">Poor</option>
      </select>
      @error('rate')
        <p style='color:red'>{{ $message }}</p>
      @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>

    <a href="/feedback" class="btn btn-danger">back to main form</a>
  </form>
</div>

<!-- Bootstrap JS and jQuery (Optional, for Bootstrap features) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

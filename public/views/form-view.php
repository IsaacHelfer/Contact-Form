<?php $title = 'Contact Form'; $style = 'styling/form-style.css'; ?>

<?php require 'partials/head.php'; ?>
    
<form action="info-view.php" method="POST">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" placeholder="John Doe"required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" placeholder="example@example.org" required>

    <label for="issue">Issue:</label>
    <select id="issue" name="issue" required>
        <option disabled selected value>-- select an option --</option>
        <option value="query">Query</option>
        <option value="feedback">Feedback</option>
        <option value="complaint">Complaint</option>
        <option value="other">Other</option>
    </select>

    <label for="comment">Comment:</label>
    <textarea id="comment" name="comment" rows=10 cols=50 placeholder="Type your comment here..." required></textarea>

    <input type="submit" value="Submit Form" id="submit">
</form>

<?php require 'partials/footer.php'; ?>
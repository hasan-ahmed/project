<?php include "templates/header.php"; ?>

<ul>
    <li>
        <a href="view_all_books.php">A.</a> View All Books
    </li>
    <li>
        <a href="view_back_order_books.php">B.</a> View all back ordered books
    </li>
    <li>
        <a href="view_customer_special_orders.php">C.</a> View special orders by given customer
    </li>
    <li>
        <a href="view_cusomer_purchases.php">D.</a> View all purchases made by given customer
    </li>
    <li>
        <a href="view_sales_by_employee.php">E.</a> View all sales made by a given employee on a specific date.
    </li>
    <li>
        <a href="purchase_details.php">F.</a> Get details of all purchases made. For each customer, return the total
            amount paid for the books ordered since the beginning of the year.
    </li>
    <li>
        <a href="books_ordered_not_received.php">G.</a> List every book ordered but not received within the period set has passed.
    </li>
    <li>
        <a href="custom_query.php">Custom query</a>
    </li>
</ul>

<?php include "templates/footer.php"; ?>
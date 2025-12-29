const borrowDate = new Date();
document.getElementById("borrowDate").valueAsDate = borrowDate;

const dueDate = new Date();
dueDate.setDate(borrowDate.getDate() + 14);
document.getElementById("dueDate").valueAsDate = dueDate;

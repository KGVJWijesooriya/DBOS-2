// Sample data for demonstration purposes
const invoiceItems = [
    { no: 1, name: 'Product A', serialNo: 'ABC123', quantity: 2, unitPrice: 10 },
    { no: 2, name: 'Product B', serialNo: 'XYZ789', quantity: 1, unitPrice: 25 },
    // Add more items as needed
  ];
  
  // Function to calculate and update the total amount
  function updateTotal() {
    const totalAmountElement = document.getElementById('totalAmount');
    let totalAmount = 0;
  
    invoiceItems.forEach(item => {
      totalAmount += item.quantity * item.unitPrice;
    });
  
    totalAmountElement.textContent = totalAmount.toFixed(2);
  }
  
  // Function to populate the invoice table with items
  function populateTable() {
    const tableBody = document.querySelector('table.items tbody');
  
    invoiceItems.forEach(item => {
      const row = document.createElement('tr');
      row.innerHTML = `
        <td>${item.no}</td>
        <td>${item.name}</td>
        <td>${item.serialNo}</td>
        <td>${item.quantity}</td>
        <td>$${item.unitPrice.toFixed(2)}</td>
        <td>$${(item.quantity * item.unitPrice).toFixed(2)}</td>
      `;
      tableBody.appendChild(row);
    });
  
    updateTotal();
  }
  
  // Function to handle the "Save" button click
  function saveInvoice() {
    // Convert the invoiceItems array to a JSON string
    const invoiceData = JSON.stringify(invoiceItems);
  
    // Create a Blob from the JSON string
    const blob = new Blob([invoiceData], { type: 'application/json' });
  
    // Create a download link for the Blob
    const downloadLink = document.createElement('a');
    downloadLink.href = URL.createObjectURL(blob);
  
    // Set the filename for the download link
    const fileName = 'invoice.json';
    downloadLink.download = fileName;
  
    // Append the download link to the document
    document.body.appendChild(downloadLink);
  
    // Simulate a click on the download link to trigger the download
    downloadLink.click();
  
    // Clean up the download link after the download
    document.body.removeChild(downloadLink);
  
    alert('Invoice saved successfully!');
  }
  
  // Function to update the current date and time in real-time
  function updateDateTime() {
    const currentDateElement = document.getElementById('currentDate');
    const currentDateTime = new Date();
    const options = { year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit', second: '2-digit' };
    const formattedDateTime = currentDateTime.toLocaleString('en-US', options);
    currentDateElement.textContent = formattedDateTime;
  }
  
  // Call the populateTable function when the page loads
  document.addEventListener('DOMContentLoaded', () => {
    populateTable();
    updateDateTime(); // Update the date and time initially
    setInterval(updateDateTime, 1000); // Update the date and time every second
  });
  

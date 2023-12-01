// Global variable to store the item details (replace with your data source)
const itemsData = [
  { barcode: "12345", name: "Item 1", serialNo: "SN001", unitPrice: 10.00 },
  { barcode: "67890", name: "Item 2", serialNo: "SN002", unitPrice: 20.00 },
  // Add more items as needed
];

// Global variable to store customer data
const customersData = [
  { customerId: "001", name: "John Doe", address: "123 Main St, City A" },
  { customerId: "CUST002", name: "Jane Smith", address: "456 Oak Ave, City B" },
  // Add more customers as needed
];


function autoFillItemDetails() {
  const barcodeNumber = document.getElementById("barcodeNumber").value;
  const itemDetailsContainer = document.getElementById("itemDetails");

  // If the barcode number is not empty, try to find the matched item
  if (barcodeNumber.trim() !== "") {
    const matchedItem = itemsData.find(item => item.barcode === barcodeNumber);

    if (matchedItem) {
      // Auto-fill table rows with the matched item details
      const newRow = document.createElement("tr");
      newRow.innerHTML = `
        <td>${itemDetailsContainer.children.length + 1}</td>
        <td>${matchedItem.name}</td>
        <td>${matchedItem.serialNo}</td>
        <td><input type="number" value="1" onchange="updatePrice(this)"></td>
        <td>${matchedItem.unitPrice.toFixed(2)}</td>
        <td>${matchedItem.unitPrice.toFixed(2)}</td>
      `;
      itemDetailsContainer.appendChild(newRow);
    }
  }

  calculateTotal(); // Update total after adding the new row
}

function updatePrice(quantityInput) {
  const row = quantityInput.parentNode.parentNode;
  const quantity = parseInt(quantityInput.value);
  const unitPrice = parseFloat(row.children[4].textContent);
  const price = quantity * unitPrice;
  row.children[5].textContent = price.toFixed(2);

  calculateTotal(); // Update total after quantity change
}

function calculateTotal() {
  // Calculate and update the total price
  let total = 0;
  const priceCells = document.querySelectorAll("#itemDetails td:nth-child(6)");

  for (let i = 0; i < priceCells.length; i++) {
    total += parseFloat(priceCells[i].textContent);
  }

  document.getElementById("total").textContent = total.toFixed(2);
}

function printReceipt() {
  // Implement the logic to print the receipt
  // You can use the browser's print functionality or any external library
}

function saveReceipt() {
  // Implement the logic to save the receipt
  // You can save the data to a database or generate a downloadable file
}

// Get the current date and time and display it in the "date-time" div
function updateDateTime() {
  const now = new Date();
  const dateTimeContainer = document.getElementById("date-time");
  dateTimeContainer.textContent = now.toLocaleString();
}

function searchCustomer() {
  const customerSerialNo = document.getElementById("customerSerialNo").value;
  const customerNameInput = document.getElementById("customerName");
  const customerAddressInput = document.getElementById("customerAddress");

  // If the customer serial number is not empty, try to find the matched customer
  if (customerSerialNo.trim() !== "") {
    const matchedCustomer = customersData.find(customer => customer.customerId === customerSerialNo);

    if (matchedCustomer) {
      // Update the customer name and address inputs with the matched customer details
      customerNameInput.value = matchedCustomer.name;
      customerAddressInput.value = matchedCustomer.address || ""; // If "address" property is not available, set it to an empty string
    } else {
      // If no matching customer is found, clear the customer name and address inputs
      customerNameInput.value = "";
      customerAddressInput.value = "";
    }
  } else {
    // If the customer serial number is empty, clear the customer name and address inputs
    customerNameInput.value = "";
    customerAddressInput.value = "";
  }
}

// Update the date and time every second
setInterval(updateDateTime, 1000);

// Initial update of date and time
updateDateTime();

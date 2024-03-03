<?php
session_start();
$userId = $_SESSION['user_id'];
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User Registry</title>
    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
      crossorigin="anonymous"
    ></script>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="./style.css">
  </head>
   
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark px-5 py-2  fixed-top"
  style="background-color:purple;  opacity: 0.75;">
      <div class="container-fluid">
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mx-auto mb-2 mb-lg-0 gap-2">
          <li class="nav-item">
              <a class="nav-link text-white" href="userDashboard.php">LAND REGISTERY</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="logout.php">LOGOUT</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="#">
              <?php
              echo "Aadhar: $userId" ;
              ?>
              </a>
            </li>
           
          </ul>
        </div>
      </div>
    </nav>

    <div class="d-flex" style="margin-top:70px">
      <div class="w-100">
        <a
          href="adduser.php"
          class="w-100 bg-dark text-white text-decoration-none"
        >
          <button class="w-100 bg-danger border-0 py-3  text-white font-italic 
          " style="font-weight:600">
            Register Land Details
          </button>
        </a>
      </div>

      <div class="w-100">
        <a
          href="Availableproperties.php"
          class="w-100 bg-danger text-white text-decoration-none"
        >
          <button class="w-100 bg-secondary border-0 py-3  text-white font-italic 
          " style="font-weight:600">
            Available Properties
          </button>
        </a>
      </div>

      <div class="w-100">
        <a
          href="ownerdetails.php"
          class="w-100 bg-success text-white text-decoration-none"
        >
          <button class="w-100 bg-warning border-0 py-3  text-white font-italic 
          " style="font-weight:600">Owner Details</button>
        </a>
      </div>
    </div>
    <!-- <div class="p-2 text-center font-italic "
     style="font-size:20px;font-weight: 500;color:white;background-color: rgb(8 47 73);">Owner Details</div> -->
     <div class="overflow-auto"> 
     <table id="usersTable" border="2">
      <thead>
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Adhar</th>
          <th>Phone</th>
          <th>PAN Number</th>
          <th>Country</th>
          <th>State</th>
          <th>City</th>
          <th>Pincode</th>
          <th>Document</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody id="usersTableBody">
        <!-- User details will be added here dynamically -->
      </tbody>
    </table>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/web3/1.5.2/web3.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/web3@1.3.4/dist/web3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
      const contractAddress = "0x051986D813c32B06E739989c5Fc723b6DaCC0dc7";
      const abi = [
        {
          inputs: [
            {
              internalType: "string",
              name: "_name",
              type: "string",
            },
            {
              internalType: "string",
              name: "_email",
              type: "string",
            },
            {
              internalType: "string",
              name: "_adhar",
              type: "string",
            },
            {
              internalType: "string",
              name: "_phone",
              type: "string",
            },
            {
              internalType: "string",
              name: "_panNumber",
              type: "string",
            },
            {
              internalType: "string",
              name: "_country",
              type: "string",
            },
            {
              internalType: "string",
              name: "_state",
              type: "string",
            },
            {
              internalType: "string",
              name: "_city",
              type: "string",
            },
            {
              internalType: "uint256",
              name: "_pincode",
              type: "uint256",
            },
            {
              internalType: "string",
              name: "_ipfsHash",
              type: "string",
            },
          ],
          name: "addUser",
          outputs: [],
          stateMutability: "nonpayable",
          type: "function",
        },
        {
          inputs: [
            {
              internalType: "string",
              name: "_adhar",
              type: "string",
            },
          ],
          name: "deleteUser",
          outputs: [],
          stateMutability: "nonpayable",
          type: "function",
        },
        {
          inputs: [],
          stateMutability: "nonpayable",
          type: "constructor",
        },
        {
          inputs: [
            {
              internalType: "string",
              name: "_adhar",
              type: "string",
            },
          ],
          name: "validateUser",
          outputs: [],
          stateMutability: "nonpayable",
          type: "function",
        },
        {
          inputs: [],
          name: "getAllUsers",
          outputs: [
            {
              components: [
                {
                  internalType: "string",
                  name: "name",
                  type: "string",
                },
                {
                  internalType: "string",
                  name: "email",
                  type: "string",
                },
                {
                  internalType: "string",
                  name: "adhar",
                  type: "string",
                },
                {
                  internalType: "string",
                  name: "phone",
                  type: "string",
                },
                {
                  internalType: "string",
                  name: "panNumber",
                  type: "string",
                },
                {
                  internalType: "string",
                  name: "country",
                  type: "string",
                },
                {
                  internalType: "string",
                  name: "state",
                  type: "string",
                },
                {
                  internalType: "string",
                  name: "city",
                  type: "string",
                },
                {
                  internalType: "uint256",
                  name: "pincode",
                  type: "uint256",
                },
                {
                  internalType: "string",
                  name: "ipfsHash",
                  type: "string",
                },
                {
                  internalType: "string",
                  name: "status",
                  type: "string",
                },
              ],
              internalType: "struct UserRegistry.User[]",
              name: "",
              type: "tuple[]",
            },
          ],
          stateMutability: "view",
          type: "function",
        },
        {
          inputs: [],
          name: "owner",
          outputs: [
            {
              internalType: "address",
              name: "",
              type: "address",
            },
          ],
          stateMutability: "view",
          type: "function",
        },
      ];
      var account;
      window.addEventListener("load", async () => {
        // Modern DApp browsers
        if (window.ethereum) {
          window.web3 = new Web3(ethereum);

          // To prevent the page reloading when the MetaMask network changes
          ethereum.autoRefreshOnNetworkChange = false;

          // To Capture the account details from MetaMask
          const accounts = await ethereum.enable();
          account = accounts[0];
        }

        // Non-DApp browsers
        else {
          alert("Non-Ethereum browser detected. Please install MetaMask");
        }
      });

      async function AllUsers() {
        // Initialize the contract instance
        const contract = new web3.eth.Contract(abi, contractAddress, {
          from: account,
        });
        const usersTableBody = document.getElementById("usersTableBody");
        usersTableBody.innerHTML = ""; // Clear existing table rows

        // Call the smart contract to get all users
        const allUsers = await contract.methods.getAllUsers().call();

        // Filter users with Aadhar number 1234567890
        const filteredUsers = allUsers.filter((user) => user.adhar === "10");

        // Iterate over each user and add them to the table
        filteredUsers.forEach((user) => {
          const row = document.createElement("tr");

          // Add user details to the row
          row.innerHTML = `
            <td>${user.name}</td>
            <td>${user.email}</td>
            <td>${user.adhar}</td>
            <td>${user.phone}</td>
            <td>${user.panNumber}</td>
            <td>${user.country}</td>
            <td>${user.state}</td>
            <td>${user.city}</td>
            <td>${user.pincode}</td>
            <td>
            <a href="https://gateway.pinata.cloud/ipfs/${user.ipfsHash}" download>
            Download
           </a>
            </td>
            <td>${user.status}</td>
        `;

          // Append the row to the table body
          usersTableBody.appendChild(row);
        });
      }

      // Load all users when the page loads
      window.addEventListener("load", async () => {
        AllUsers();
      });
    </script>
  </body>
</html>

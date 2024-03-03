<?php
session_start();
$userId = $_SESSION['user_id'];
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Student Registry</title>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <link rel="stylesheet" href="./style.css">

  </head>
  <body >
  <nav class="navbar navbar-expand-lg navbar-dark px-5 py-2  fixed-top"
  style="background-color: purple ; opacity: 0.75;"
  >
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
      <div class="w-100 ">
        <a
          href="adduser.php"
          class="w-100 bg-dark text-white text-decoration-none"
        >
          <button class="w-100 bg-danger border-0 py-3 
          text-white font-italic 
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
     style="font-size:20px;font-weight: 500;color:white;background-color: rgb(8 47 73);">User Registry</div> -->
     <div class="w-auto ml-5 mt-3 "> 
     <form action="/Submit" method="post " class="w-50">
      <div class="form-group my-0 ">
          <input type="text" id="name" class="form-control" placeholder="Name" required />
      </div>
  
      <div class="form-group my-0">
          <input type="email" id="email" class="form-control" placeholder="Email" required />
      </div>
  
      <div class="form-group  my-0">
          <input type="text" id="aadhaar" class="form-control" placeholder="Aadhaar Number" required />
      </div>
  
      <div class="form-group  my-0">
          <input type="text" id="phone" class="form-control" placeholder="Phone Number" required />
      </div>
  
      <div class="form-group  my-0">
          <input type="text" id="pancard" class="form-control" placeholder="PAN Card Number" required />
      </div>
  
      <div class="form-group  my-0">
          <input type="text" id="country" class="form-control" placeholder="Country" required />
      </div>
  
      <div class="form-group  my-0">
          <input type="text" id="state" class="form-control" placeholder="State" required />
      </div>
  
      <div class="form-group  my-0">
          <input type="text" id="city" class="form-control" placeholder="City" required />
      </div>
  
      <div class="form-group  my-0">
          <input type="number" id="pincode" class="form-control" placeholder="Pincode" required />
      </div>
  
      <div class="form-group  my-0">
          <div>
              <input class="block mt-1" type="file" id="fileInput" accept=".pdf,.jpg,.jpeg,.png">
             <button type="button" class="btn btn-success float-right" onclick="FileUpload()">Upload</button>
            </div>
      </div>
      <div class="form-group  my-0">
          <input type="text" id="pinatahash" class="form-control" placeholder="Document Hash" />
      </div>
  
      <button type="button" class="btn btn-primary mt-2 p-2 btn-block" onclick="addUserDetails()">Submit</button>
  </form>
</div>
  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/web3/1.5.2/web3.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/web3@1.3.4/dist/web3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <script>
      const API_KEY = '18cadb8df5c2041440a5';
      const API_SECRET = 'fd8c62ac769b3b38b646dc594bdef600f3c75defe21dbe9fdc0d70561909274c';
      async function FileUpload() {
        const file = document.getElementById('fileInput').files[0];
        if (!file) {
          alert('Please select a file to upload');
          return;
        }
        const formData = new FormData();
        formData.append('file', file);

        $.ajax({
          url: 'https://api.pinata.cloud/pinning/pinFileToIPFS',
          method: 'POST',
          headers: {
            'pinata_api_key': API_KEY,
            'pinata_secret_api_key': API_SECRET
          },
          data: formData,
          contentType: false,
          processData: false,
          success: function(response) {
            alert('IPFS hash: '+ response.IpfsHash);
            document.getElementById('pinatahash').value=response.IpfsHash
          },
          error: function(error) {
            console.log(error);
            alert('File upload failed. Please try again later.');
          }
        });
      } 
     
      // Set the address of the deployed contract
      const contractAddress = "0x051986D813c32B06E739989c5Fc723b6DaCC0dc7"; // Replace with the deployed contract address
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

      // Function to register a student
      async function addUserDetails() {
        // Initialize the contract instance
        const contract = new web3.eth.Contract(abi, contractAddress, {
          from: account,
        });
        var name = document.getElementById("name").value;
        var email = document.getElementById("email").value;
        var adharnumber = document.getElementById("aadhaar").value;
        var phone = document.getElementById("phone").value;
        var pancard = document.getElementById("pancard").value;
        var country = document.getElementById("country").value;
        var state = document.getElementById("state").value;
        var city = document.getElementById("city").value;
        var pincode = document.getElementById("pincode").value;
        var pinatahash = document.getElementById("pinatahash").value;
        if (
          name === "" ||
          email === "" ||
          adharnumber === "" ||
          phone === "" ||
          pancard === "" ||
          country === "" ||
          state === "" ||
          city === "" ||
          pincode === "" ||
          pinatahash === ""
        ) {
          event.preventDefault();
          alert("All fields must be filled");
          return;
        } else {
          alert(
            "Name: " +
              name +
              "\n" +
              "Email: " +
              email +
              "\n" +
              "Aadhar Number: " +
              adharnumber +
              "\n" +
              "Phone Number: " +
              phone +
              "\n" +
              "PAN Card Number: " +
              pancard +
              "\n" +
              "Country: " +
              country +
              "\n" +
              "State: " +
              state +
              "\n" +
              "City: " +
              city +
              "\n" +
              "Pincode: " +
              pincode +
              "\n" +
              "Hashvalue: " +
              pinatahash
          );
        }

        try {
          // Metamask will prompt the user to sign the transaction
          const result = await contract.methods
            .addUser(
              name,
              email,
              adharnumber,
              phone,
              pancard,
              country,
              state,
              city,
              pincode,
              pinatahash
            )
            .send();

          // Check transaction status
          if (result.status === true) {
            alert("Land Details registered successfully!");
          }
        } catch (error) {
          alert("Transition failed as Adhar number already exists");
        }
      }
    </script>
  </body>
</html>

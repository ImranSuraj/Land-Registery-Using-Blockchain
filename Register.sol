// SPDX-License-Identifier: MIT
pragma solidity ^0.8.0;

contract UserRegistry {
    address public owner;
    
    enum Status { Not_Approved, Approve, Approved, Rejected_by_Govt }

    struct User {
        string name;
        string email;
        string adhar;
        string phone;
        string panNumber;
        string country;
        string state;
        string city;
        uint256 pincode;
        string ipfsHash;
        string status; // Changed to string status
    }

    mapping(string => User) private UserByAdhar;
    string[] private UserAdhars;


    constructor() {
        owner = msg.sender;
    }
    
    modifier onlyOwner() {
        require(msg.sender == owner, "Only owner can call this function");
        _;
    }

    function addUser(
        string memory _name,
        string memory _email,
        string memory _adhar,
        string memory _phone,
        string memory _panNumber,
        string memory _country,
        string memory _state,
        string memory _city,
        uint256 _pincode,
        string memory _ipfsHash
    ) public {
        require(bytes(UserByAdhar[_adhar].phone).length == 0, "Adhar already exists");

        UserByAdhar[_adhar] = User(_name, _email, _adhar, _phone, _panNumber, _country, _state, _city, _pincode, _ipfsHash, "Not_Approved_Yet"); // Default status set to "Not_Approved"
        UserAdhars.push(_adhar);
    }

    function getAllUsers() public view returns (User[] memory) {
        User[] memory allusers = new User[](UserAdhars.length);
        for(uint256 i = 0; i < UserAdhars.length; i++) {
            allusers[i] = UserByAdhar[UserAdhars[i]];
        }
        return allusers;
    }
    
    function deleteUser(string memory _adhar) public onlyOwner {
        require(bytes(UserByAdhar[_adhar].adhar).length != 0, "User does not exist");
        UserByAdhar[_adhar].status = "Rejected_by_Govt"; // Change status to "Rejected_by_Govt"
    }
    
    function validateUser(string memory _adhar) public onlyOwner {
        require(bytes(UserByAdhar[_adhar].adhar).length != 0, "User does not exist");
        UserByAdhar[_adhar].status = "Govt_Approved"; // Change status to "Govt_Approved"
    }
}

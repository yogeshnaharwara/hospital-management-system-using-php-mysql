const doctorsData = [ // Neurology
  {
    name: "Dr. Ramesh Mehta", specialty: "Neurology", experience: "10 years",
    qualification: "MBBS, MD (Neuro)", contact: "9876543210",
    email: "ramesh@khaitanhospital.com", timing: "10 AM - 2 PM",
    image: "neurology1.jpg"
  },
  {
    name: "Dr. Neha Jain", specialty: "Neurology", experience: "8 years",
    qualification: "MBBS, DM (Neurology)", contact: "9876543211",
    email: "neha@khaitanhospital.com", timing: "11 AM - 3 PM",
    image: "neurology2.jpg"
  },
  {
    name: "Dr. Sanjay Kapoor", specialty: "Neurology", experience: "12 years",
    qualification: "MBBS, DNB", contact: "9876543212",
    email: "sanjay@khaitanhospital.com", timing: "9 AM - 1 PM",
    image: "neurology3.jpg"
  },
  {
    name: "Dr. Anjali Sinha", specialty: "Neurology", experience: "7 years",
    qualification: "MBBS, MD", contact: "9876543213",
    email: "anjali@khaitanhospital.com", timing: "1 PM - 5 PM",
    image: "neurology4.jpg"
  },
  {
    name: "Dr. Prateek Yadav", specialty: "Neurology", experience: "9 years",
    qualification: "MBBS, DM", contact: "9876543214",
    email: "prateek@khaitanhospital.com", timing: "2 PM - 6 PM",
    image: "neurology5.jpg"
  },

  // Cardiology
  {
    name: "Dr. Pooja Sharma", specialty: "Cardiology", experience: "11 years",
    qualification: "MBBS, DM (Cardio)", contact: "9876543220",
    email: "pooja@khaitanhospital.com", timing: "10 AM - 1 PM",
    image: "cardiology1.jpg"
  },
  {
    name: "Dr. Vinod Malhotra", specialty: "Cardiology", experience: "13 years",
    qualification: "MBBS, MD", contact: "9876543221",
    email: "vinod@khaitanhospital.com", timing: "11 AM - 3 PM",
    image: "cardiology2.jpg"
  },
  {
    name: "Dr. Meenakshi Verma", specialty: "Cardiology", experience: "6 years",
    qualification: "MBBS, DM", contact: "9876543222",
    email: "meenakshi@khaitanhospital.com", timing: "12 PM - 4 PM",
    image: "cardiology3.jpg"
  },
  {
    name: "Dr. Rajeev Thakur", specialty: "Cardiology", experience: "10 years",
    qualification: "MBBS, MD", contact: "9876543223",
    email: "rajeev@khaitanhospital.com", timing: "9 AM - 12 PM",
    image: "cardiology4.jpg"
  },
  {
    name: "Dr. Swati Mishra", specialty: "Cardiology", experience: "8 years",
    qualification: "MBBS, DM", contact: "9876543224",
    email: "swati@khaitanhospital.com", timing: "2 PM - 6 PM",
    image: "cardiology5.jpg"
  },

  // Orthopedics
  {
    name: "Dr. Anil Verma", specialty: "Orthopedics", experience: "14 years",
    qualification: "MBBS, MS", contact: "9876543230",
    email: "anil@khaitanhospital.com", timing: "10 AM - 1 PM",
    image: "ortho1.jpg"
  },
  {
    name: "Dr. Kavita Rao", specialty: "Orthopedics", experience: "9 years",
    qualification: "MBBS, MS", contact: "9876543231",
    email: "kavita@khaitanhospital.com", timing: "11 AM - 2 PM",
    image: "ortho2.jpg"
  },
  {
    name: "Dr. Rohit Gupta", specialty: "Orthopedics", experience: "7 years",
    qualification: "MBBS, MS", contact: "9876543232",
    email: "rohit@khaitanhospital.com", timing: "9 AM - 12 PM",
    image: "ortho3.jpg"
  },
  {
    name: "Dr. Sneha Agarwal", specialty: "Orthopedics", experience: "6 years",
    qualification: "MBBS, DNB", contact: "9876543233",
    email: "sneha@khaitanhospital.com", timing: "2 PM - 5 PM",
    image: "ortho4.jpg"
  },
  {
    name: "Dr. Dinesh Sharma", specialty: "Orthopedics", experience: "12 years",
    qualification: "MBBS, MS", contact: "9876543234",
    email: "dinesh@khaitanhospital.com", timing: "3 PM - 6 PM",
    image: "ortho5.jpg"
  },

  // Dentist
  {
    name: "Dr. Kavita Yadav", specialty: "Dentist", experience: "5 years",
    qualification: "BDS", contact: "9876543240",
    email: "kavitay@khaitanhospital.com", timing: "10 AM - 1 PM",
    image: "dentist1.jpg"
  },
  {
    name: "Dr. Nikhil Joshi", specialty: "Dentist", experience: "7 years",
    qualification: "BDS", contact: "9876543241",
    email: "nikhil@khaitanhospital.com", timing: "11 AM - 2 PM",
    image: "dentist2.jpg"
  },
  {
    name: "Dr. Priya Bansal", specialty: "Dentist", experience: "6 years",
    qualification: "BDS, MDS", contact: "9876543242",
    email: "priya@khaitanhospital.com", timing: "12 PM - 3 PM",
    image: "dentist3.jpg"
  },
  {
    name: "Dr. Mohit Rawat", specialty: "Dentist", experience: "8 years",
    qualification: "BDS, MDS", contact: "9876543243",
    email: "mohit@khaitanhospital.com", timing: "2 PM - 5 PM",
    image: "dentist4.jpg"
  },
  {
    name: "Dr. Shalini Tyagi", specialty: "Dentist", experience: "9 years",
    qualification: "BDS", contact: "9876543244",
    email: "shalini@khaitanhospital.com", timing: "3 PM - 6 PM",
    image: "dentist5.jpg"
  },

  // General Physician
  {
    name: "Dr. Rahul Singh", specialty: "General Physician", experience: "10 years",
    qualification: "MBBS", contact: "9876543250",
    email: "rahul@khaitanhospital.com", timing: "9 AM - 12 PM",
    image: "gp1.jpg"
  },
  {
    name: "Dr. Meera Dubey", specialty: "General Physician", experience: "6 years",
    qualification: "MBBS", contact: "9876543251",
    email: "meera@khaitanhospital.com", timing: "11 AM - 2 PM",
    image: "gp2.jpg"
  },
  {
    name: "Dr. Harsh Yadav", specialty: "General Physician", experience: "8 years",
    qualification: "MBBS", contact: "9876543252",
    email: "harsh@khaitanhospital.com", timing: "1 PM - 4 PM",
    image: "gp3.jpg"
  },
  {
    name: "Dr. Sunita Nair", specialty: "General Physician", experience: "9 years",
    qualification: "MBBS", contact: "9876543253",
    email: "sunita@khaitanhospital.com", timing: "10 AM - 1 PM",
    image: "gp4.jpg"
  },
  {
    name: "Dr. Amit Tomar", specialty: "General Physician", experience: "11 years",
    qualification: "MBBS", contact: "9876543254",
    email: "amit@khaitanhospital.com", timing: "3 PM - 6 PM",
    image: "gp5.jpg"
  } ]; 

// 🟢 Extract unique departments from data
const departments = ["All", ...new Set(doctorsData.map(doc => doc.specialty))];

// 🟡 Render department buttons dynamically
function renderDepartments() {
  const deptContainer = document.getElementById("departments");
  departments.forEach(dept => {
    const btn = document.createElement("button");
    btn.className = "department-btn";
    btn.textContent = dept;
    btn.onclick = () => showDoctorsByDepartment(dept);
    deptContainer.appendChild(btn);
  });
}

// 🔵 Render doctors based on selected department
function showDoctorsByDepartment(department) {
  const container = document.getElementById("doctors-container");
  container.innerHTML = "";

  const filteredDoctors = department === "All"
    ? doctorsData
    : doctorsData.filter(doc => doc.specialty === department);

  if (filteredDoctors.length === 0) {
    container.innerHTML = "<p>No doctors available for this department.</p>";
    return;
  }

  filteredDoctors.forEach(doc => {
    const card = document.createElement("div");
    card.className = "doctor-card";
    card.innerHTML = `
      <img src="${doc.image}" alt="${doc.name}" onerror="this.src='https://cdn-icons-png.flaticon.com/512/3774/3774299.png'">
      <h3>${doc.name}</h3>
      <p><strong>Specialty:</strong> ${doc.specialty}</p>
      <p><strong>Experience:</strong> ${doc.experience}</p>
      <p><strong>Qualification:</strong> ${doc.qualification}</p>
      <p><strong>Contact:</strong> ${doc.contact}</p>
      <p><strong>Email:</strong> ${doc.email}</p>
      <p><strong>Timing:</strong> ${doc.timing}</p>
      <button class="book-btn" onclick="bookAppointment('${doc.name}')">Book Appointment</button>
    `;
    container.appendChild(card);
  });
}

function bookAppointment(doctorName) {
  localStorage.setItem("selectedDoctor", doctorName);
  window.location.href = "appointment.html";
}

// 🔘 Initialize on load
window.onload = () => {
  renderDepartments();
  showDoctorsByDepartment("All");
};

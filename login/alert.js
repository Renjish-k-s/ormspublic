console.log('haii loaded');

function alertcustom(message, status = 0) {
    // Remove existing alert if any
    let existingAlert = document.getElementById('custom-alert-box');
    if (existingAlert) {
        existingAlert.remove();
    }
    
    // Set colors and icons based on status
    let colors, icon, title;
    
    if (status === 1) {
        // Success style
        colors = {
            background: "linear-gradient(135deg, #155724, #28a745)",
            buttonBg: "#d4edda",
            buttonText: "#155724",
            buttonHover: "#c3e6cb"
        };
        icon = `<div style="font-size: 40px; margin-bottom: 10px;">✅</div>`;
        title = `<h3 style="margin-top: 0; margin-bottom: 10px;">Success!</h3>`;
    } else if (status === 2) {
        // Warning style
        colors = {
            background: "linear-gradient(135deg, #856404, #ffc107)",
            buttonBg: "#fff3cd",
            buttonText: "#856404",
            buttonHover: "#ffeeba"
        };
        icon = `<div style="font-size: 40px; margin-bottom: 10px;">⚠️</div>`;
        title = `<h3 style="margin-top: 0; margin-bottom: 10px;">Warning!</h3>`;
    } else {
        // Default style (your original blue style)
        colors = {
            background: "linear-gradient(135deg, #2C3E50, #3498DB)",
            buttonBg: "#ECF0F1",
            buttonText: "#2C3E50",
            buttonHover: "#BDC3C7"
        };
        icon = "";
        title = "";
    }
    
    // Create the alert box
    let alertBox = document.createElement("div");
    alertBox.id = "custom-alert-box";
    
    // Add icon and title if status is provided
    alertBox.innerHTML = `
        ${icon}
        ${title}
        <p style="margin: 0; word-wrap: break-word;">${message}</p>
        <button onclick="document.getElementById('custom-alert-box').remove()">OK</button>
    `;
    
    // Apply styles dynamically
    alertBox.style.position = "fixed";
    alertBox.style.top = "50%";
    alertBox.style.left = "50%";
    alertBox.style.transform = "translate(-50%, -50%)";
    alertBox.style.background = colors.background;
    alertBox.style.color = "white";
    alertBox.style.padding = "20px";
    alertBox.style.borderRadius = "8px";
    alertBox.style.boxShadow = "0px 4px 10px rgba(0, 0, 0, 0.2)";
    alertBox.style.textAlign = "center";
    alertBox.style.fontSize = "18px";
    alertBox.style.fontFamily = "Arial, sans-serif";
    alertBox.style.zIndex = "1000";
    alertBox.style.minWidth = "300px";
    alertBox.style.maxWidth = "80%";
    
    // Style the button
    let button = alertBox.querySelector("button");
    button.style.background = colors.buttonBg;
    button.style.color = colors.buttonText;
    button.style.border = "none";
    button.style.padding = "8px 15px";
    button.style.cursor = "pointer";
    button.style.fontSize = "16px";
    button.style.borderRadius = "5px";
    button.style.marginTop = "15px";
    button.style.fontWeight = "bold";
    
    button.onmouseover = function() {
        button.style.background = colors.buttonHover;
    };
    
    button.onmouseout = function() {
        button.style.background = colors.buttonBg;
    };
    
    // Append to body
    document.body.appendChild(alertBox);
}
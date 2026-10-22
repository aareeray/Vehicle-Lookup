# 🚗 VahanVerify — Indian Vehicle RC & RTO Information API

A serverless Indian Vehicle Registration Certificate (RC) and RTO Information lookup service optimized for deployment on Vercel.

## 🌟 Features

- **Instant RTO & Vehicle Verification**: Look up vehicle specifications, registration authority, owner details, fitness, and insurance status.
- **Interactive IND Number Plate**: Real-time license plate visualizer built into the frontend interface.
- **Comprehensive Specs**:
  - Vehicle Maker & Model
  - Registration Authority (RTO Office, Code & State)
  - Vehicle Class & Fuel Type (Petrol, Diesel, Electric, CNG)
  - Engine & Chassis numbers (Masked for privacy)
  - Insurance Company & Validity
  - Fitness & PUC Certificate Status
  - Hypothecation / Financing Details
- **Dual Interface**:
  - **Modern Web Application**: Responsive dark-mode UI with glassmorphism for human visitors.
  - **REST API Endpoint**: Returns clean JSON data for bot and programmatic integrations.
- **Vercel Serverless Ready**: Uses `vercel-php` to run serverlessly with zero server management.

## 🚀 Live Demo

- **Web Portal**: [https://vehicle-lookup-red.vercel.app/](https://vehicle-lookup-red.vercel.app/)
- **API Request**: `https://vehicle-lookup-red.vercel.app/?rc=MH12DE1433&format=json`

## 🛠️ API Usage

### Example Request (cURL)
```bash
curl "https://vehicle-lookup-red.vercel.app/?rc=MH12DE1433&format=json"
```

### Example Response
```json
{
  "success": true,
  "credit": "@FREDDY_X_NETWORKBOT",
  "channel": "https://t.me/FREDDY_X_NETWORK",
  "api_valid_until": "May 6, 2027",
  "days_remaining": 195,
  "source": "VAHAN_RTO_REGISTRY",
  "query_rc": "MH12DE1433",
  "result": {
    "rc_number": "MH12DE1433",
    "owner_name": "R***SH P***L",
    "maker_model": "MARUTI SUZUKI SWIFT VXI",
    "vehicle_class": "Motor Car (Light Motor Vehicle - Non Transport)",
    "fuel_type": "PETROL",
    "transmission": "MANUAL",
    "color": "Pearl Arctic White",
    "seating_capacity": "5 Seater",
    "cubic_capacity": "1197 CC",
    "registration_date": "14-Aug-2021",
    "vehicle_age": "3 yrs, 2 mos",
    "fitness_valid_upto": "14-Aug-2036",
    "fitness_status": "ACTIVE / VALID",
    "insurance_company": "ICICI LOMBARD GENERAL INSURANCE CO. LTD.",
    "insurance_valid_upto": "28-Sep-2025",
    "insurance_status": "ACTIVE",
    "puc_valid_upto": "12-Apr-2025",
    "puc_status": "VALID",
    "emission_norms": "BHARAT STAGE VI (BS-VI)",
    "engine_number": "K12ME84***291",
    "chassis_number": "MA3A2E81***7482",
    "financer": "HDFC BANK LIMITED",
    "rto_office": "Pune RTO",
    "rto_code": "MH12",
    "state": "Maharashtra",
    "registration_status": "ACTIVE"
  }
}
```

## ⚙️ Deployment to Vercel

1. Import this repository to [Vercel](https://vercel.com/new).
2. Deploy directly with default settings (`vercel.json` is pre-configured).

---
© 2024 VahanVerify. All Rights Reserved.

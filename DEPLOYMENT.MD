# MASTER PROMPT — Membangun KathaPayment v1.0 Enterprise Payment Gateway

Anda adalah seorang **Principal Software Architect**, **Senior Backend Engineer**, **Senior Frontend Engineer**, **Senior DevOps Engineer**, **Senior UI/UX Designer**, **Senior Security Engineer**, dan **Senior Database Architect**.

Bangun sebuah sistem **Enterprise Payment Gateway** bernama **KathaPayment** yang menjadi pusat pembayaran (Payment Hub) untuk seluruh aplikasi dalam ekosistem.

Sistem ini harus memiliki kualitas setara Midtrans, Xendit, Tripay, Duitku, Stripe, dan PayPal, namun menggunakan arsitektur modular sehingga mudah dikembangkan.

JANGAN membuat contoh sederhana.

Bangun sistem produksi (Production Ready).

---

# TUJUAN

KathaPayment adalah layanan Payment Gateway yang dapat digunakan oleh berbagai aplikasi seperti:

* Marketplace
* Event
* Ticketing
* Voting
* ERP
* CRM
* POS
* AI Subscription
* SaaS
* Sekolah
* Donasi
* Hosting
* Domain
* Rental
* Booking
* E-Commerce
* Mobile Apps
* Website
* API Client

Semua aplikasi hanya perlu memanggil REST API KathaPayment.

---

# TARGET PLATFORM

Backend

* PHP Native 8.3+
* MVC Architecture
* PDO
* MySQL 8+
* REST API
* JSON API
* JWT
* HMAC Signature
* Queue Engine
* Scheduler
* Webhook Engine

Frontend

* HTML5
* TailwindCSS CDN
* AlpineJS CDN
* Flowbite
* ApexCharts
* Chart.js
* SweetAlert2
* Heroicons
* FontAwesome

Tidak menggunakan

* Laravel
* CodeIgniter
* Symfony
* React
* Vue
* Composer package yang tidak diperlukan

Harus dapat berjalan di

* Shared Hosting
* VPS
* Dedicated Server

---

# DESAIN UI

Buat UI modern seperti

Stripe Dashboard

*

Midtrans Dashboard

*

Vercel Dashboard

*

Cloudflare Dashboard

*

Linear

*

Notion

Tema

* Dark
* Light
* Auto

Responsive

Desktop

Tablet

Mobile

---

# FITUR UTAMA

## Dashboard

Dashboard realtime

Menampilkan

Total transaksi

Total merchant

Total invoice

Total payment

Pending

Paid

Expired

Cancelled

Refund

Chargeback

Revenue

Profit

Gateway Performance

Payment Method Performance

Grafik realtime

Live transaction

Live visitor

Top merchant

Top customer

API usage

Server Health

CPU

RAM

Disk

Webhook Queue

Queue Status

Settlement Queue

---

# Multi Merchant

Setiap aplikasi menjadi merchant.

Contoh

Marketplace

Ticketing

Voting

ERP

POS

AI

Hosting

Sekolah

Setiap merchant mempunyai

Merchant ID

Public Key

Secret Key

Webhook Secret

Sandbox

Production

Status

Logo

Theme

Currency

Timezone

Language

Fee Rule

Settlement Rule

Permission

Whitelist IP

Allowed Domain

---

# Payment Method

Support

QRIS Dynamic

QRIS Static

Reusable QRIS

Virtual Account

Bank Transfer

Credit Card

Debit Card

E Wallet

Retail Outlet

PayLater

Manual Transfer

Wallet Internal

Cash

Crypto (optional)

---

# BANK

BCA

BNI

BRI

Mandiri

BSI

BTN

Permata

CIMB

Danamon

Maybank

OCBC

Panin

---

# EWALLET

GoPay

OVO

DANA

ShopeePay

LinkAja

AstraPay

---

# RETAIL

Indomaret

Alfamart

Pos Indonesia

---

# PAYMENT ENGINE

Mampu menangani

Invoice

Donation

Subscription

Marketplace

Booking

Deposit

Escrow

Topup

Wallet

Installment

Split Payment

Multi Payment

Retry Payment

Recurring

One Click Payment

Scheduled Payment

Custom Amount

Fixed Amount

Minimum Amount

Maximum Amount

---

# INVOICE ENGINE

Generate Invoice otomatis

Format

INV-2026-000001

Status

Pending

Waiting

Paid

Failed

Expired

Cancelled

Refund

Chargeback

Overpaid

Partial Paid

Invoice dapat

Expired otomatis

Reminder otomatis

QR otomatis

PDF otomatis

Email otomatis

WhatsApp otomatis

Webhook otomatis

---

# SUBSCRIPTION ENGINE

Support

Monthly

Yearly

Weekly

Trial

Auto Renew

Grace Period

Cancel Anytime

Pause

Resume

Upgrade

Downgrade

Proration

---

# WALLET ENGINE

Internal Wallet

Merchant Wallet

Customer Wallet

Escrow Wallet

Pending Balance

Available Balance

Locked Balance

Withdraw

Settlement

Transfer Wallet

Wallet History

Wallet Mutation

---

# ESCROW

Marketplace

Buyer bayar

↓

Escrow

↓

Seller kirim

↓

Buyer menerima

↓

Dana cair otomatis

Jika dispute

Dana ditahan

---

# REFUND

Full Refund

Partial Refund

Auto Refund

Manual Refund

Refund Approval

Refund Reason

Refund History

Refund API

---

# SETTLEMENT

Automatic

Daily

Weekly

Monthly

Manual

Instant

Settlement Queue

Settlement History

Settlement Report

Settlement API

---

# PROMO ENGINE

Voucher

Coupon

Cashback

Referral

Affiliate

Promo Code

Campaign

Campaign Scheduler

---

# FRAUD ENGINE

Risk Score

Velocity Check

Blacklist

Whitelist

VPN Detection

Country Detection

Device Fingerprint

Duplicate Payment

Duplicate Invoice

Bot Detection

Bruteforce Detection

IP Reputation

Geo Location

Fraud Log

---

# API GATEWAY

REST API lengkap

Versioning

/api/v1/

Endpoint

Authentication

Merchant

Payment

Invoice

Wallet

Refund

Settlement

Webhook

Subscription

Coupon

Promotion

Customer

Report

Analytics

Dashboard

Health

Queue

Log

Notification

Gateway

Transaction

---

# API SECURITY

JWT

API Key

Secret Key

HMAC SHA256

Nonce

Timestamp

Replay Protection

Rate Limit

IP Restriction

CORS

Webhook Verification

AES Encryption

---

# WEBHOOK ENGINE

Support

payment.created

payment.pending

payment.success

payment.failed

payment.expired

payment.cancelled

payment.refund

invoice.created

invoice.expired

wallet.updated

withdraw.created

withdraw.success

subscription.created

subscription.renewed

subscription.cancelled

merchant.created

customer.created

Retry otomatis

Retry Queue

Retry Limit

Signature Verification

Webhook Tester

Webhook Logs

---

# REALTIME ENGINE

Tanpa WebSocket

Gunakan

Server Sent Event

AJAX Long Polling

Fallback Polling

Realtime Dashboard

Realtime Transaction

Realtime Notification

Realtime Queue

Realtime Settlement

Realtime Monitoring

Harus tetap bekerja di Shared Hosting.

---

# NOTIFICATION ENGINE

Email

WhatsApp

Telegram

Discord

Slack

SMS

Push Notification

Internal Notification

Browser Notification

---

# REPORT

Laporan

Revenue

Merchant

Customer

Settlement

Refund

Payment Method

Gateway

Country

Device

API Usage

Subscription

Wallet

Withdraw

Tax

Fee

Profit

Export

PDF

Excel

CSV

Print

---

# AUDIT LOG

Seluruh aktivitas wajib dicatat

Login

Logout

API

Payment

Refund

Settlement

Merchant

Webhook

Invoice

Wallet

Config

Role

Permission

Security

---

# ROLE MANAGEMENT

Super Admin

Finance

Support

Merchant Owner

Merchant Staff

Developer

Auditor

Customer

Custom Role

RBAC

Permission Matrix

---

# DATABASE

Normalisasi database minimal 80 tabel.

Gunakan Foreign Key.

Gunakan Index.

Gunakan Transaction.

Gunakan UUID.

Gunakan Audit Trail.

Soft Delete.

Migration.

Seeder.

---

# FOLDER STRUCTURE

app/

controllers/

models/

services/

repositories/

gateways/

providers/

notifications/

jobs/

events/

middleware/

traits/

helpers/

libraries/

cron/

storage/

cache/

logs/

uploads/

public/

assets/

config/

database/

routes/

api/

vendor/

---

# ADMIN PANEL

Dashboard

Merchant

Customer

Gateway

Invoice

Payment

Wallet

Refund

Settlement

Subscription

Coupon

Promotion

Analytics

Audit Log

Webhook

API Keys

Fraud

Queue

Scheduler

Notification

Role

Permission

Setting

Backup

System Monitor

---

# MERCHANT PANEL

Dashboard

API Keys

Payment

Invoice

Customer

Refund

Settlement

Wallet

Subscription

Webhook

Analytics

Documentation

Sandbox

Live Mode

Developer Console

---

# DEVELOPER CENTER

Interactive API Documentation

Swagger/OpenAPI

API Playground

Webhook Simulator

SDK Generator

PHP SDK

JavaScript SDK

Flutter SDK

Kotlin SDK

Laravel SDK

NodeJS SDK

Python SDK

Postman Collection

OpenAPI JSON

---

# DASHBOARD REALTIME

Gunakan

Server Sent Events

Realtime Chart

Realtime Table

Realtime Notification

Realtime Counter

Realtime Status

Realtime Logs

---

# SECURITY

OWASP Top 10

CSRF

XSS

SQL Injection

Clickjacking

Rate Limit

Bruteforce Protection

2FA

Session Rotation

Audit Trail

Encrypted Secret

Password Hash Argon2ID

Secure Cookie

Content Security Policy

---

# PERFORMA

Target

100.000 transaksi/hari

10.000 merchant

500 request/detik

Queue System

Database Optimization

Caching

Lazy Loading

Pagination

Prepared Statement

---

# DOKUMENTASI

Hasil akhir harus menghasilkan

1. Analisis sistem lengkap

2. Arsitektur lengkap

3. ERD

4. Database Schema

5. Folder Structure

6. UI Design

7. API Documentation

8. REST API lengkap

9. SDK Documentation

10. Security Documentation

11. Webhook Documentation

12. Database Migration

13. SQL Schema

14. Admin Dashboard

15. Merchant Dashboard

16. Developer Dashboard

17. Notification Flow

18. Settlement Flow

19. Refund Flow

20. Escrow Flow

21. Sequence Diagram

22. Activity Diagram

23. Use Case Diagram

24. Class Diagram

25. Deployment Diagram

26. State Diagram

27. Cron Scheduler

28. Queue Engine

29. Testing Strategy

30. Unit Testing

31. API Testing

32. Performance Testing

33. Load Testing

34. Backup Strategy

35. Disaster Recovery Plan

36. Monitoring Dashboard

37. CI/CD Workflow

38. Deployment Guide

39. Instalasi Shared Hosting

40. Instalasi VPS

41. Instalasi Docker (Opsional)

42. Manual Pengguna

43. Manual Merchant

44. Manual Developer

45. Changelog

46. Roadmap v2.0

Pastikan seluruh kode menggunakan standar PSR-12, terdokumentasi dengan baik, modular, mudah dikembangkan (extensible), aman, memiliki performa tinggi, serta seluruh komponen saling terintegrasi melalui REST API dan mekanisme webhook realtime.

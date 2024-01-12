@extends('layouts.app')

@section('title', 'Create Order')

@section('content')
    <style>
         h2 {
            color: #333;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        table {
            width: 100%;
            margin-bottom: 20px;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        input,
        select,
        textarea {
            width: calc(100% - 16px);
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
    <h2>Create Order</h2>
    <form action="{{ route('orders.store') }}" method="post">
        @csrf
        <table>
            <tr>
                <td>
                    <label for="full_name">Full Name:</label>
                    <input type="text" id="full_name" name="full_name" required>
                </td>
                <td>
                    <label for="title">Title:</label>
                    <input type="text" id="title" name="title" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="first_name">First Name:</label>
                    <input type="text" id="first_name" name="first_name" required>
                </td>
                <td>
                    <label for="last_name">Last Name:</label>
                    <input type="text" id="last_name" name="last_name" required>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <label for="email">Email Address:</label>
                    <input type="email" id="email" name="email" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="phone">Phone Number:</label>
                    <input type="tel" id="phone" name="phone" required>
                </td>
                <td>
                    <label for="currency">Currency:</label>
                    <select id="currency" name="currency" required>
                        <option value="AFN">Afghanistan Afghani (؋)</option>
                        <option value="ALL">Albania Lek (Lek)</option>
                        <option value="ARS">Argentina Peso ($)</option>
                        <option value="AWG">Aruba Guilder (ƒ)</option>
                        <option value="AUD">Australian Dollar (A$)</option>
                        <option value="AZN">Azerbaijan Manat (ман)</option>
                        <option value="BSD">Bahamas Dollar ($)</option>
                        <option value="BBD">Barbados Dollar ($)</option>
                        <option value="BYN">Belarus Ruble (Br)</option>
                        <option value="BZD">Belize Dollar (BZ$)</option>
                        <option value="BMD">Bermuda Dollar ($)</option>
                        <option value="BOB">Bolivia Bolíviano (b)</option>
                        <option value="BAM">Bosnia and Herzegovina Convertible Marka (KM)</option>
                        <option value="BWP">Botswana Pula (P)</option>
                        <option value="BRL">Brazilian Real (R$)</option>
                        <option value="GBP">British Pound (£)</option>
                        <option value="BND">Brunei Darussalam Dollar ($)</option>
                        <option value="BGN">Bulgaria Lev (лв)</option>
                        <option value="KHR">Cambodia Riel (៛)</option>
                        <option value="CAD">Canadian Dollar (C$)</option>
                        <option value="KYD">Cayman Islands Dollar ($)</option>
                        <option value="CLP">Chile Peso ($)</option>
                        <option value="CNY">China Yuan Renminbi (¥)</option>
                        <option value="COP">Colombia Peso ($)</option>
                        <option value="CRC">Costa Rica Colon (₡)</option>
                        <option value="HRK">Croatia Kuna (kn)</option>
                        <option value="CUP">Cuba Peso (₱)</option>
                        <option value="CZK">Czech Republic Koruna (Kč)</option>
                        <option value="DKK">Danish Krone (kr)</option>
                        <option value="DOP">Dominican Republic Peso (RD$)</option>
                        <option value="XCD">East Caribbean Dollar ($)</option>
                        <option value="EGP">Egypt Pound (£)</option>
                        <option value="SVC">El Salvador Colon ($)</option>
                        <option value="EUR">Euro (€)</option>
                        <option value="FKP">Falkland Islands (Malvinas) Pound (£)</option>
                        <option value="FJD">Fiji Dollar ($)</option>
                        <option value="GHS">Ghana Cedi (¢)</option>
                        <option value="GIP">Gibraltar Pound (£)</option>
                        <option value="GTQ">Guatemala Quetzal (Q)</option>
                        <option value="GGP">Guernsey Pound (£)</option>
                        <option value="GYD">Guyana Dollar ($)</option>
                        <option value="HNL">Honduras Lempira (L)</option>
                        <option value="HKD">Hong Kong Dollar (HK$)</option>
                        <option value="HUF">Hungary Forint (Ft)</option>
                        <option value="ISK">Iceland Krona (kr)</option>
                        <option value="INR">India Rupee (₹)</option>
                        <option value="IDR">Indonesia Rupiah (Rp)</option>
                        <option value="IRR">Iran Rial (﷼)</option>
                        <option value="IMP">Isle of Man Pound (£)</option>
                        <option value="ILS">Israel Shekel (₪)</option>
                        <option value="JMD">Jamaica Dollar (J$)</option>
                        <option value="JPY">Japanese Yen (¥)</option>
                        <option value="JEP">Jersey Pound (£)</option>
                        <option value="KZT">Kazakhstan Tenge (лв)</option>
                        <option value="KPW">Korea (North) Won (₩)</option>
                        <option value="KRW">Korea (South) Won (₩)</option>
                        <option value="KGS">Kyrgyzstan Som (лв)</option>
                        <option value="LAK">Laos Kip (₭)</option>
                        <option value="LBP">Lebanon Pound (£)</option>
                        <option value="LRD">Liberia Dollar ($)</option>
                        <option value="MYR">Malaysia Ringgit (RM)</option>
                        <option value="MUR">Mauritius Rupee (₨)</option>
                        <option value="MXN">Mexico Peso ($)</option>
                        <option value="MNT">Mongolia Tughrik (₮)</option>
                        <option value="MZN">Mozambique Metical (MT)</option>
                        <option value="NAD">Namibia Dollar ($)</option>
                        <option value="NPR">Nepal Rupee (₨)</option>
                        <option value="ANG">Netherlands Antilles Guilder (ƒ)</option>
                        <option value="NZD">New Zealand Dollar ($NZD)</option>
                        <option value="NIO">Nicaragua Cordoba (C$NIO)</option>
                        <option value="NGN">Nigeria Naira (₦NGN)</option>
                        <option value="MKD">North Macedonia Denar (денMKD)</option>
                        <option value="NOK">Norwegian Krone (krNOK)</option>
                        <option value="OMR">Oman Rial (﷼OMR)</option>
                        <option value="PKR">Pakistan Rupee (₨PKR)</option>
                        <option value="PAB">Panama Balboa (B/.PAB)</option>
                        <option value="PYG">Paraguay Guarani (GsPYG)</option>
                        <option value="PEN">Peru Sol (S/.PEN)</option>
                        <option value="PHP">Philippines Peso (₱PHP)</option>
                        <option value="PLN">Poland Zloty (złPLN)</option>
                        <option value="QAR">Qatar Riyal (﷼QAR)</option>
                        <option value="RON">Romania Leu (leiRON)</option>
                        <option value="RUB">Russian Rouble (₽RUB)</option>
                        <option value="SHP">Saint Helena Pound (£SHP)</option>
                        <option value="SAR">Saudi Arabia Riyal (﷼SAR)</option>
                        <option value="RSD">Serbia Dinar (Дин.RSD)</option>
                        <option value="SCR">Seychelles Rupee (₨SCR)</option>
                        <option value="SGD">Singapore Dollar (S$SGD)</option>
                        <option value="SBD">Solomon Islands Dollar ($SBD)</option>
                        <option value="SOS">Somalia Shilling (SSOS)</option>
                        <option value="ZAR">South Africa Rand (RZAR)</option>
                        <option value="LKR">Sri Lanka Rupee (₨LKR)</option>
                        <option value="SRD">Suriname Dollar ($SRD)</option>
                        <option value="SEK">Swedish Krona (krSEK)</option>
                        <option value="CHF">Swiss Franc (SFrCHF)</option>
                        <option value="SYP">Syria Pound (£SYP)</option>
                        <option value="TWD">Taiwan Dollar (NT$TWD)</option>
                        <option value="THB">Thailand Baht (฿THB)</option>
                        <option value="TTD">Trinidad and Tobago Dollar (TT$TTD)</option>
                        <option value="TRY">Turkish Lira (₺TRY)</option>
                        <option value="TVD">Tuvalu Dollar ($TVD)</option>
                        <option value="UAH">Ukraine Hryvnia (₴UAH)</option>
                        <option value="UYU">Uruguay Peso ($UUYU)</option>
                        <option value="USD">US Dollar ($USD)</option>
                        <option value="UZS">Uzbekistan Som (лвUZS)</option>
                        <option value="VEF">Venezuela Bolívar (BsVEF)</option>
                        <option value="VND">Viet Nam Dong (₫VND)</option>
                        <option value="YER">Yemen Rial (﷼YER)</option>
                        <option value="ZWD">Zimbabwe Dollar (Z$ZWD)</option>
                    </select>
                </td>
            </tr>                
            <tr>
                <td colspan="2">
                    <label for="order_reference">Order Reference:</label>
                    <input type="text" id="order_reference" name="order_reference" required>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <label for="Search">Search for an address book entry or a UK address
                        :</label>
                    <input type="text" id="Search" name="Search" required>
                </td>
            </tr>
            <tr>
                <div class="create-order-address-search">
                    <address-box ng-model="vm.order" class="ng-pristine ng-untouched ng-valid ng-not-empty">
                        <label for="address-box-company-name-0">
                            <span translate>Address</span>
                            <div class="validation-message ng-inactive" ng-messages="form['address-box-company-name-' + instanceNumber].$error"ng-if="!excludeCompany && validate">
                            </div>
                            <div class="validation-message ng-active"ng-messages="form['address-box-address-line-1-' + instanceNumber].$error"ng-if="showAddressLine1ValidationMessage() && validate"style>
                                <div ng-if="isPostcodeRequired()"ng-message="required">
                                    ::before
                                    "Address line 1, city and postcode are required"
                                </div>
                            </div>
                        <div class="validation-message ng-inactive"ng-messages="form['address-box-address-line-2-' + instanceNumber].$error"ng-if="validate">
                        </div>
                        <div class="validation-message ng-inactive"ng-messages="form['address-box-address-line-3-' + instanceNumber].$error"ng-if="validate">
                        </div>
                        <div class="validation-message ng-inactive"ng-messages="form['address-box-county-' + instanceNumber].$error"ng-if="validate">
                        </div>
                        </label>
                {{-- <td colspan="2">
                    <label for="address_reference">Address reference
                        :</label>
                    <input type="text" id="address_reference" name="address_reference" required>
                </td> --}}
            </tr>
            <tr>
                <td colspan="2">
                    <label for="address">Address:</label>                   
                    <textarea id="address" name="address" rows="4" required></textarea>
                </td>
            </tr>
        </table>
        <div>
            <table>
                <tr>
                    <td colspan="1" class="button_container">
                        <button type='submit'>Add Product</button>
                    </td>
                    <td colspan="1" class="button-container">
                        <button type='submit'>Add Button</button>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="button-container">
                        <button type="submit">Create Order</button>
                    </td>
                </tr>
            </table>
    </form>
@endsection

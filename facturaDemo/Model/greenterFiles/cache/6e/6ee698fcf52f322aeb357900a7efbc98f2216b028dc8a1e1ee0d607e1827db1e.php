<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* invoice2.1.xml.twig */
class __TwigTemplate_19c2603df8eba5b952c8b743132244b1972e5db15abd0ef700eecad3e51105e7 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        ob_start(function () { return ''; });
        // line 2
        echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>
<Invoice xmlns=\"urn:oasis:names:specification:ubl:schema:xsd:Invoice-2\" xmlns:cac=\"urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2\" xmlns:cbc=\"urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2\" xmlns:ds=\"http://www.w3.org/2000/09/xmldsig#\" xmlns:ext=\"urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2\">
    <ext:UBLExtensions>
        <ext:UBLExtension>
            <ext:ExtensionContent/>
        </ext:UBLExtension>
    </ext:UBLExtensions>
    ";
        // line 9
        $context["emp"] = twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "company", [], "any", false, false, false, 9);
        // line 10
        echo "    <cbc:UBLVersionID>2.1</cbc:UBLVersionID>
    <cbc:CustomizationID>2.0</cbc:CustomizationID>
    <cbc:ID>";
        // line 12
        echo twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "serie", [], "any", false, false, false, 12);
        echo "-";
        echo twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "correlativo", [], "any", false, false, false, 12);
        echo "</cbc:ID>
    <cbc:IssueDate>";
        // line 13
        echo twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "fechaEmision", [], "any", false, false, false, 13), "Y-m-d");
        echo "</cbc:IssueDate>
    <cbc:IssueTime>";
        // line 14
        echo twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "fechaEmision", [], "any", false, false, false, 14), "H:i:s");
        echo "</cbc:IssueTime>
    ";
        // line 15
        if (twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "fecVencimiento", [], "any", false, false, false, 15)) {
            // line 16
            echo "    <cbc:DueDate>";
            echo twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "fecVencimiento", [], "any", false, false, false, 16), "Y-m-d");
            echo "</cbc:DueDate>
    ";
        }
        // line 18
        echo "    <cbc:InvoiceTypeCode listID=\"";
        echo twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "tipoOperacion", [], "any", false, false, false, 18);
        echo "\">";
        echo twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "tipoDoc", [], "any", false, false, false, 18);
        echo "</cbc:InvoiceTypeCode>
    ";
        // line 19
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "legends", [], "any", false, false, false, 19));
        foreach ($context['_seq'] as $context["_key"] => $context["leg"]) {
            // line 20
            echo "    <cbc:Note languageLocaleID=\"";
            echo twig_get_attribute($this->env, $this->source, $context["leg"], "code", [], "any", false, false, false, 20);
            echo "\"><![CDATA[";
            echo twig_get_attribute($this->env, $this->source, $context["leg"], "value", [], "any", false, false, false, 20);
            echo "]]></cbc:Note>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['leg'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 22
        echo "    ";
        if (twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "observacion", [], "any", false, false, false, 22)) {
            // line 23
            echo "    <cbc:Note><![CDATA[";
            echo twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "observacion", [], "any", false, false, false, 23);
            echo "]]></cbc:Note>
    ";
        }
        // line 25
        echo "    <cbc:DocumentCurrencyCode>";
        echo twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 25);
        echo "</cbc:DocumentCurrencyCode>
    ";
        // line 26
        if (twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "compra", [], "any", false, false, false, 26)) {
            // line 27
            echo "    <cac:OrderReference>
        <cbc:ID>";
            // line 28
            echo twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "compra", [], "any", false, false, false, 28);
            echo "</cbc:ID>
    </cac:OrderReference>
    ";
        }
        // line 31
        echo "    ";
        if (twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "guias", [], "any", false, false, false, 31)) {
            // line 32
            echo "    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "guias", [], "any", false, false, false, 32));
            foreach ($context['_seq'] as $context["_key"] => $context["guia"]) {
                // line 33
                echo "    <cac:DespatchDocumentReference>
        <cbc:ID>";
                // line 34
                echo twig_get_attribute($this->env, $this->source, $context["guia"], "nroDoc", [], "any", false, false, false, 34);
                echo "</cbc:ID>
        <cbc:DocumentTypeCode>";
                // line 35
                echo twig_get_attribute($this->env, $this->source, $context["guia"], "tipoDoc", [], "any", false, false, false, 35);
                echo "</cbc:DocumentTypeCode>
    </cac:DespatchDocumentReference>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['guia'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 38
            echo "    ";
        }
        // line 39
        echo "    ";
        if (twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "relDocs", [], "any", false, false, false, 39)) {
            // line 40
            echo "    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "relDocs", [], "any", false, false, false, 40));
            foreach ($context['_seq'] as $context["_key"] => $context["rel"]) {
                // line 41
                echo "    <cac:AdditionalDocumentReference>
        <cbc:ID>";
                // line 42
                echo twig_get_attribute($this->env, $this->source, $context["rel"], "nroDoc", [], "any", false, false, false, 42);
                echo "</cbc:ID>
        <cbc:DocumentTypeCode>";
                // line 43
                echo twig_get_attribute($this->env, $this->source, $context["rel"], "tipoDoc", [], "any", false, false, false, 43);
                echo "</cbc:DocumentTypeCode>
    </cac:AdditionalDocumentReference>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['rel'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 46
            echo "    ";
        }
        // line 47
        echo "    ";
        if (twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "anticipos", [], "any", false, false, false, 47)) {
            // line 48
            echo "    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "anticipos", [], "any", false, false, false, 48));
            $context['loop'] = [
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            ];
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["ant"]) {
                // line 49
                echo "    <cac:AdditionalDocumentReference>
        <cbc:ID>";
                // line 50
                echo twig_get_attribute($this->env, $this->source, $context["ant"], "nroDocRel", [], "any", false, false, false, 50);
                echo "</cbc:ID>
        <cbc:DocumentTypeCode>";
                // line 51
                echo twig_get_attribute($this->env, $this->source, $context["ant"], "tipoDocRel", [], "any", false, false, false, 51);
                echo "</cbc:DocumentTypeCode>
        <cbc:DocumentStatusCode>";
                // line 52
                echo twig_get_attribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 52);
                echo "</cbc:DocumentStatusCode>
        <cac:IssuerParty>
            <cac:PartyIdentification>
                <cbc:ID schemeID=\"6\">";
                // line 55
                echo twig_get_attribute($this->env, $this->source, ($context["emp"] ?? null), "ruc", [], "any", false, false, false, 55);
                echo "</cbc:ID>
            </cac:PartyIdentification>
        </cac:IssuerParty>
    </cac:AdditionalDocumentReference>
    ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ant'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 60
            echo "    ";
        }
        // line 61
        echo "    <cac:Signature>
        <cbc:ID>";
        // line 62
        echo twig_get_attribute($this->env, $this->source, ($context["emp"] ?? null), "ruc", [], "any", false, false, false, 62);
        echo "</cbc:ID>
        <cac:SignatoryParty>
            <cac:PartyIdentification>
                <cbc:ID>";
        // line 65
        echo twig_get_attribute($this->env, $this->source, ($context["emp"] ?? null), "ruc", [], "any", false, false, false, 65);
        echo "</cbc:ID>
            </cac:PartyIdentification>
            <cac:PartyName>
                <cbc:Name><![CDATA[";
        // line 68
        echo twig_get_attribute($this->env, $this->source, ($context["emp"] ?? null), "razonSocial", [], "any", false, false, false, 68);
        echo "]]></cbc:Name>
            </cac:PartyName>
        </cac:SignatoryParty>
        <cac:DigitalSignatureAttachment>
            <cac:ExternalReference>
                <cbc:URI>#GREENTER-SIGN</cbc:URI>
            </cac:ExternalReference>
        </cac:DigitalSignatureAttachment>
    </cac:Signature>
    <cac:AccountingSupplierParty>
        <cac:Party>
            <cac:PartyIdentification>
                <cbc:ID schemeID=\"6\">";
        // line 80
        echo twig_get_attribute($this->env, $this->source, ($context["emp"] ?? null), "ruc", [], "any", false, false, false, 80);
        echo "</cbc:ID>
            </cac:PartyIdentification>
            <cac:PartyName>
                <cbc:Name><![CDATA[";
        // line 83
        echo twig_get_attribute($this->env, $this->source, ($context["emp"] ?? null), "nombreComercial", [], "any", false, false, false, 83);
        echo "]]></cbc:Name>
            </cac:PartyName>
            <cac:PartyLegalEntity>
                <cbc:RegistrationName><![CDATA[";
        // line 86
        echo twig_get_attribute($this->env, $this->source, ($context["emp"] ?? null), "razonSocial", [], "any", false, false, false, 86);
        echo "]]></cbc:RegistrationName>
                ";
        // line 87
        $context["addr"] = twig_get_attribute($this->env, $this->source, ($context["emp"] ?? null), "address", [], "any", false, false, false, 87);
        // line 88
        echo "                <cac:RegistrationAddress>
                    <cbc:ID>";
        // line 89
        echo twig_get_attribute($this->env, $this->source, ($context["addr"] ?? null), "ubigueo", [], "any", false, false, false, 89);
        echo "</cbc:ID>
                    <cbc:AddressTypeCode>";
        // line 90
        echo twig_get_attribute($this->env, $this->source, ($context["addr"] ?? null), "codLocal", [], "any", false, false, false, 90);
        echo "</cbc:AddressTypeCode>
                    ";
        // line 91
        if (twig_get_attribute($this->env, $this->source, ($context["addr"] ?? null), "urbanizacion", [], "any", false, false, false, 91)) {
            // line 92
            echo "                    <cbc:CitySubdivisionName>";
            echo twig_get_attribute($this->env, $this->source, ($context["addr"] ?? null), "urbanizacion", [], "any", false, false, false, 92);
            echo "</cbc:CitySubdivisionName>
                    ";
        }
        // line 94
        echo "                    <cbc:CityName>";
        echo twig_get_attribute($this->env, $this->source, ($context["addr"] ?? null), "provincia", [], "any", false, false, false, 94);
        echo "</cbc:CityName>
                    <cbc:CountrySubentity>";
        // line 95
        echo twig_get_attribute($this->env, $this->source, ($context["addr"] ?? null), "departamento", [], "any", false, false, false, 95);
        echo "</cbc:CountrySubentity>
                    <cbc:District>";
        // line 96
        echo twig_get_attribute($this->env, $this->source, ($context["addr"] ?? null), "distrito", [], "any", false, false, false, 96);
        echo "</cbc:District>
                    <cac:AddressLine>
                        <cbc:Line><![CDATA[";
        // line 98
        echo twig_get_attribute($this->env, $this->source, ($context["addr"] ?? null), "direccion", [], "any", false, false, false, 98);
        echo "]]></cbc:Line>
                    </cac:AddressLine>
                    <cac:Country>
                        <cbc:IdentificationCode>";
        // line 101
        echo twig_get_attribute($this->env, $this->source, ($context["addr"] ?? null), "codigoPais", [], "any", false, false, false, 101);
        echo "</cbc:IdentificationCode>
                    </cac:Country>
                </cac:RegistrationAddress>
            </cac:PartyLegalEntity>
            ";
        // line 105
        if ((twig_get_attribute($this->env, $this->source, ($context["emp"] ?? null), "email", [], "any", false, false, false, 105) || twig_get_attribute($this->env, $this->source, ($context["emp"] ?? null), "telephone", [], "any", false, false, false, 105))) {
            // line 106
            echo "            <cac:Contact>
                ";
            // line 107
            if (twig_get_attribute($this->env, $this->source, ($context["emp"] ?? null), "telephone", [], "any", false, false, false, 107)) {
                // line 108
                echo "                <cbc:Telephone>";
                echo twig_get_attribute($this->env, $this->source, ($context["emp"] ?? null), "telephone", [], "any", false, false, false, 108);
                echo "</cbc:Telephone>
                ";
            }
            // line 110
            echo "                ";
            if (twig_get_attribute($this->env, $this->source, ($context["emp"] ?? null), "email", [], "any", false, false, false, 110)) {
                // line 111
                echo "                <cbc:ElectronicMail>";
                echo twig_get_attribute($this->env, $this->source, ($context["emp"] ?? null), "email", [], "any", false, false, false, 111);
                echo "</cbc:ElectronicMail>
                ";
            }
            // line 113
            echo "            </cac:Contact>
            ";
        }
        // line 115
        echo "        </cac:Party>
    </cac:AccountingSupplierParty>
    ";
        // line 117
        $context["client"] = twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "client", [], "any", false, false, false, 117);
        // line 118
        echo "    <cac:AccountingCustomerParty>
        <cac:Party>
            <cac:PartyIdentification>
                <cbc:ID schemeID=\"";
        // line 121
        echo twig_get_attribute($this->env, $this->source, ($context["client"] ?? null), "tipoDoc", [], "any", false, false, false, 121);
        echo "\">";
        echo twig_get_attribute($this->env, $this->source, ($context["client"] ?? null), "numDoc", [], "any", false, false, false, 121);
        echo "</cbc:ID>
            </cac:PartyIdentification>
            <cac:PartyLegalEntity>
                <cbc:RegistrationName><![CDATA[";
        // line 124
        echo twig_get_attribute($this->env, $this->source, ($context["client"] ?? null), "rznSocial", [], "any", false, false, false, 124);
        echo "]]></cbc:RegistrationName>
                ";
        // line 125
        if (twig_get_attribute($this->env, $this->source, ($context["client"] ?? null), "address", [], "any", false, false, false, 125)) {
            // line 126
            echo "                ";
            $context["addr"] = twig_get_attribute($this->env, $this->source, ($context["client"] ?? null), "address", [], "any", false, false, false, 126);
            // line 127
            echo "                <cac:RegistrationAddress>
                    ";
            // line 128
            if (twig_get_attribute($this->env, $this->source, ($context["addr"] ?? null), "ubigueo", [], "any", false, false, false, 128)) {
                // line 129
                echo "                    <cbc:ID>";
                echo twig_get_attribute($this->env, $this->source, ($context["addr"] ?? null), "ubigueo", [], "any", false, false, false, 129);
                echo "</cbc:ID>
                    ";
            }
            // line 131
            echo "                    <cac:AddressLine>
                        <cbc:Line><![CDATA[";
            // line 132
            echo twig_get_attribute($this->env, $this->source, ($context["addr"] ?? null), "direccion", [], "any", false, false, false, 132);
            echo "]]></cbc:Line>
                    </cac:AddressLine>
                    <cac:Country>
                        <cbc:IdentificationCode>";
            // line 135
            echo twig_get_attribute($this->env, $this->source, ($context["addr"] ?? null), "codigoPais", [], "any", false, false, false, 135);
            echo "</cbc:IdentificationCode>
                    </cac:Country>
                </cac:RegistrationAddress>
                ";
        }
        // line 139
        echo "            </cac:PartyLegalEntity>
            ";
        // line 140
        if ((twig_get_attribute($this->env, $this->source, ($context["client"] ?? null), "email", [], "any", false, false, false, 140) || twig_get_attribute($this->env, $this->source, ($context["client"] ?? null), "telephone", [], "any", false, false, false, 140))) {
            // line 141
            echo "            <cac:Contact>
                ";
            // line 142
            if (twig_get_attribute($this->env, $this->source, ($context["client"] ?? null), "telephone", [], "any", false, false, false, 142)) {
                // line 143
                echo "                <cbc:Telephone>";
                echo twig_get_attribute($this->env, $this->source, ($context["client"] ?? null), "telephone", [], "any", false, false, false, 143);
                echo "</cbc:Telephone>
                ";
            }
            // line 145
            echo "                ";
            if (twig_get_attribute($this->env, $this->source, ($context["client"] ?? null), "email", [], "any", false, false, false, 145)) {
                // line 146
                echo "                <cbc:ElectronicMail>";
                echo twig_get_attribute($this->env, $this->source, ($context["client"] ?? null), "email", [], "any", false, false, false, 146);
                echo "</cbc:ElectronicMail>
                ";
            }
            // line 148
            echo "            </cac:Contact>
            ";
        }
        // line 150
        echo "        </cac:Party>
    </cac:AccountingCustomerParty>
    ";
        // line 152
        $context["seller"] = twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "seller", [], "any", false, false, false, 152);
        // line 153
        echo "    ";
        if (($context["seller"] ?? null)) {
            // line 154
            echo "    <cac:SellerSupplierParty>
        <cac:Party>
            <cac:PartyIdentification>
                <cbc:ID schemeID=\"";
            // line 157
            echo twig_get_attribute($this->env, $this->source, ($context["seller"] ?? null), "tipoDoc", [], "any", false, false, false, 157);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, ($context["seller"] ?? null), "numDoc", [], "any", false, false, false, 157);
            echo "</cbc:ID>
            </cac:PartyIdentification>
            <cac:PartyLegalEntity>
                <cbc:RegistrationName><![CDATA[";
            // line 160
            echo twig_get_attribute($this->env, $this->source, ($context["seller"] ?? null), "rznSocial", [], "any", false, false, false, 160);
            echo "]]></cbc:RegistrationName>
                ";
            // line 161
            if (twig_get_attribute($this->env, $this->source, ($context["seller"] ?? null), "address", [], "any", false, false, false, 161)) {
                // line 162
                echo "                ";
                $context["addr"] = twig_get_attribute($this->env, $this->source, ($context["seller"] ?? null), "address", [], "any", false, false, false, 162);
                // line 163
                echo "                <cac:RegistrationAddress>
                    ";
                // line 164
                if (twig_get_attribute($this->env, $this->source, ($context["addr"] ?? null), "ubigueo", [], "any", false, false, false, 164)) {
                    // line 165
                    echo "                    <cbc:ID>";
                    echo twig_get_attribute($this->env, $this->source, ($context["addr"] ?? null), "ubigueo", [], "any", false, false, false, 165);
                    echo "</cbc:ID>
                    ";
                }
                // line 167
                echo "                    <cac:AddressLine>
                        <cbc:Line><![CDATA[";
                // line 168
                echo twig_get_attribute($this->env, $this->source, ($context["addr"] ?? null), "direccion", [], "any", false, false, false, 168);
                echo "]]></cbc:Line>
                    </cac:AddressLine>
                    <cac:Country>
                        <cbc:IdentificationCode>";
                // line 171
                echo twig_get_attribute($this->env, $this->source, ($context["addr"] ?? null), "codigoPais", [], "any", false, false, false, 171);
                echo "</cbc:IdentificationCode>
                    </cac:Country>
                </cac:RegistrationAddress>
                ";
            }
            // line 175
            echo "            </cac:PartyLegalEntity>
            ";
            // line 176
            if ((twig_get_attribute($this->env, $this->source, ($context["seller"] ?? null), "email", [], "any", false, false, false, 176) || twig_get_attribute($this->env, $this->source, ($context["seller"] ?? null), "telephone", [], "any", false, false, false, 176))) {
                // line 177
                echo "            <cac:Contact>
                ";
                // line 178
                if (twig_get_attribute($this->env, $this->source, ($context["seller"] ?? null), "telephone", [], "any", false, false, false, 178)) {
                    // line 179
                    echo "                <cbc:Telephone>";
                    echo twig_get_attribute($this->env, $this->source, ($context["seller"] ?? null), "telephone", [], "any", false, false, false, 179);
                    echo "</cbc:Telephone>
                ";
                }
                // line 181
                echo "                ";
                if (twig_get_attribute($this->env, $this->source, ($context["seller"] ?? null), "email", [], "any", false, false, false, 181)) {
                    // line 182
                    echo "                <cbc:ElectronicMail>";
                    echo twig_get_attribute($this->env, $this->source, ($context["seller"] ?? null), "email", [], "any", false, false, false, 182);
                    echo "</cbc:ElectronicMail>
                ";
                }
                // line 184
                echo "            </cac:Contact>
            ";
            }
            // line 186
            echo "        </cac:Party>
    </cac:SellerSupplierParty>
    ";
        }
        // line 189
        echo "    ";
        if (twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "direccionEntrega", [], "any", false, false, false, 189)) {
            // line 190
            echo "        ";
            $context["addr"] = twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "direccionEntrega", [], "any", false, false, false, 190);
            // line 191
            echo "        <cac:Delivery>
            <cac:DeliveryLocation>
                <cac:Address>
                    <cbc:ID>";
            // line 194
            echo twig_get_attribute($this->env, $this->source, ($context["addr"] ?? null), "ubigueo", [], "any", false, false, false, 194);
            echo "</cbc:ID>
                    ";
            // line 195
            if (twig_get_attribute($this->env, $this->source, ($context["addr"] ?? null), "urbanizacion", [], "any", false, false, false, 195)) {
                // line 196
                echo "                    <cbc:CitySubdivisionName>";
                echo twig_get_attribute($this->env, $this->source, ($context["addr"] ?? null), "urbanizacion", [], "any", false, false, false, 196);
                echo "</cbc:CitySubdivisionName>
                    ";
            }
            // line 198
            echo "                    <cbc:CityName>";
            echo twig_get_attribute($this->env, $this->source, ($context["addr"] ?? null), "provincia", [], "any", false, false, false, 198);
            echo "</cbc:CityName>
                    <cbc:CountrySubentity>";
            // line 199
            echo twig_get_attribute($this->env, $this->source, ($context["addr"] ?? null), "departamento", [], "any", false, false, false, 199);
            echo "</cbc:CountrySubentity>
                    <cbc:District>";
            // line 200
            echo twig_get_attribute($this->env, $this->source, ($context["addr"] ?? null), "distrito", [], "any", false, false, false, 200);
            echo "</cbc:District>
                    <cac:AddressLine>
                        <cbc:Line><![CDATA[";
            // line 202
            echo twig_get_attribute($this->env, $this->source, ($context["addr"] ?? null), "direccion", [], "any", false, false, false, 202);
            echo "]]></cbc:Line>
                    </cac:AddressLine>
                    <cac:Country>
                        <cbc:IdentificationCode listID=\"ISO 3166-1\" listAgencyName=\"United Nations Economic Commission for Europe\" listName=\"Country\">";
            // line 205
            echo twig_get_attribute($this->env, $this->source, ($context["addr"] ?? null), "codigoPais", [], "any", false, false, false, 205);
            echo "</cbc:IdentificationCode>
                    </cac:Country>
                </cac:Address>
            </cac:DeliveryLocation>
        </cac:Delivery>
    ";
        }
        // line 211
        echo "    ";
        if (twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "detraccion", [], "any", false, false, false, 211)) {
            // line 212
            echo "    ";
            $context["detr"] = twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "detraccion", [], "any", false, false, false, 212);
            // line 213
            echo "    <cac:PaymentMeans>
        <cbc:PaymentMeansCode>";
            // line 214
            echo twig_get_attribute($this->env, $this->source, ($context["detr"] ?? null), "codMedioPago", [], "any", false, false, false, 214);
            echo "</cbc:PaymentMeansCode>
        <cac:PayeeFinancialAccount>
            <cbc:ID>";
            // line 216
            echo twig_get_attribute($this->env, $this->source, ($context["detr"] ?? null), "ctaBanco", [], "any", false, false, false, 216);
            echo "</cbc:ID>
        </cac:PayeeFinancialAccount>
    </cac:PaymentMeans>
    <cac:PaymentTerms>
        <cbc:PaymentMeansID>";
            // line 220
            echo twig_get_attribute($this->env, $this->source, ($context["detr"] ?? null), "codBienDetraccion", [], "any", false, false, false, 220);
            echo "</cbc:PaymentMeansID>
        <cbc:PaymentPercent>";
            // line 221
            echo twig_get_attribute($this->env, $this->source, ($context["detr"] ?? null), "percent", [], "any", false, false, false, 221);
            echo "</cbc:PaymentPercent>
        <cbc:Amount currencyID=\"PEN\">";
            // line 222
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [twig_get_attribute($this->env, $this->source, ($context["detr"] ?? null), "mount", [], "any", false, false, false, 222)]);
            echo "</cbc:Amount>
    </cac:PaymentTerms>
    ";
        }
        // line 225
        echo "    ";
        if (twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "perception", [], "any", false, false, false, 225)) {
            // line 226
            echo "    <cac:PaymentTerms>
        <cbc:ID>Percepcion</cbc:ID>
        <cbc:Amount currencyID=\"PEN\">";
            // line 228
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "perception", [], "any", false, false, false, 228), "mtoTotal", [], "any", false, false, false, 228)]);
            echo "</cbc:Amount>
    </cac:PaymentTerms>
    ";
        }
        // line 231
        echo "    ";
        if (twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "anticipos", [], "any", false, false, false, 231)) {
            // line 232
            echo "    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "anticipos", [], "any", false, false, false, 232));
            $context['loop'] = [
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            ];
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["ant"]) {
                // line 233
                echo "    <cac:PrepaidPayment>
        <cbc:ID>";
                // line 234
                echo twig_get_attribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 234);
                echo "</cbc:ID>
        <cbc:PaidAmount currencyID=\"";
                // line 235
                echo twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 235);
                echo "\">";
                echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [twig_get_attribute($this->env, $this->source, $context["ant"], "total", [], "any", false, false, false, 235)]);
                echo "</cbc:PaidAmount>
    </cac:PrepaidPayment>
    ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ant'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 238
            echo "    ";
        }
        // line 239
        echo "    ";
        if (twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "cargos", [], "any", false, false, false, 239)) {
            // line 240
            echo "    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "cargos", [], "any", false, false, false, 240));
            foreach ($context['_seq'] as $context["_key"] => $context["cargo"]) {
                // line 241
                echo "    <cac:AllowanceCharge>
        <cbc:ChargeIndicator>true</cbc:ChargeIndicator>
        <cbc:AllowanceChargeReasonCode>";
                // line 243
                echo twig_get_attribute($this->env, $this->source, $context["cargo"], "codTipo", [], "any", false, false, false, 243);
                echo "</cbc:AllowanceChargeReasonCode>
        <cbc:MultiplierFactorNumeric>";
                // line 244
                echo twig_get_attribute($this->env, $this->source, $context["cargo"], "factor", [], "any", false, false, false, 244);
                echo "</cbc:MultiplierFactorNumeric>
        <cbc:Amount currencyID=\"";
                // line 245
                echo twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 245);
                echo "\">";
                echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [twig_get_attribute($this->env, $this->source, $context["cargo"], "monto", [], "any", false, false, false, 245)]);
                echo "</cbc:Amount>
        <cbc:BaseAmount currencyID=\"";
                // line 246
                echo twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 246);
                echo "\">";
                echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [twig_get_attribute($this->env, $this->source, $context["cargo"], "montoBase", [], "any", false, false, false, 246)]);
                echo "</cbc:BaseAmount>
    </cac:AllowanceCharge>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cargo'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 249
            echo "    ";
        }
        // line 250
        echo "    ";
        if (twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "descuentos", [], "any", false, false, false, 250)) {
            // line 251
            echo "    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "descuentos", [], "any", false, false, false, 251));
            foreach ($context['_seq'] as $context["_key"] => $context["desc"]) {
                // line 252
                echo "    <cac:AllowanceCharge>
        <cbc:ChargeIndicator>false</cbc:ChargeIndicator>
        <cbc:AllowanceChargeReasonCode>";
                // line 254
                echo twig_get_attribute($this->env, $this->source, $context["desc"], "codTipo", [], "any", false, false, false, 254);
                echo "</cbc:AllowanceChargeReasonCode>
        <cbc:MultiplierFactorNumeric>";
                // line 255
                echo twig_get_attribute($this->env, $this->source, $context["desc"], "factor", [], "any", false, false, false, 255);
                echo "</cbc:MultiplierFactorNumeric>
        <cbc:Amount currencyID=\"";
                // line 256
                echo twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 256);
                echo "\">";
                echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [twig_get_attribute($this->env, $this->source, $context["desc"], "monto", [], "any", false, false, false, 256)]);
                echo "</cbc:Amount>
        <cbc:BaseAmount currencyID=\"";
                // line 257
                echo twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 257);
                echo "\">";
                echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [twig_get_attribute($this->env, $this->source, $context["desc"], "montoBase", [], "any", false, false, false, 257)]);
                echo "</cbc:BaseAmount>
    </cac:AllowanceCharge>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['desc'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 260
            echo "    ";
        }
        // line 261
        echo "    ";
        if (twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "perception", [], "any", false, false, false, 261)) {
            // line 262
            echo "    ";
            $context["perc"] = twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "perception", [], "any", false, false, false, 262);
            // line 263
            echo "    <cac:AllowanceCharge>
        <cbc:ChargeIndicator>true</cbc:ChargeIndicator>
        <cbc:AllowanceChargeReasonCode>";
            // line 265
            echo twig_get_attribute($this->env, $this->source, ($context["perc"] ?? null), "codReg", [], "any", false, false, false, 265);
            echo "</cbc:AllowanceChargeReasonCode>
        <cbc:MultiplierFactorNumeric>";
            // line 266
            echo twig_get_attribute($this->env, $this->source, ($context["perc"] ?? null), "porcentaje", [], "any", false, false, false, 266);
            echo "</cbc:MultiplierFactorNumeric>
        <cbc:Amount currencyID=\"PEN\">";
            // line 267
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [twig_get_attribute($this->env, $this->source, ($context["perc"] ?? null), "mto", [], "any", false, false, false, 267)]);
            echo "</cbc:Amount>
        <cbc:BaseAmount currencyID=\"PEN\">";
            // line 268
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [twig_get_attribute($this->env, $this->source, ($context["perc"] ?? null), "mtoBase", [], "any", false, false, false, 268)]);
            echo "</cbc:BaseAmount>
    </cac:AllowanceCharge>
    ";
        }
        // line 271
        echo "    <cac:TaxTotal>
        <cbc:TaxAmount currencyID=\"";
        // line 272
        echo twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 272);
        echo "\">";
        echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "totalImpuestos", [], "any", false, false, false, 272)]);
        echo "</cbc:TaxAmount>
        ";
        // line 273
        if (twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "mtoISC", [], "any", false, false, false, 273)) {
            // line 274
            echo "        <cac:TaxSubtotal>
            <cbc:TaxableAmount currencyID=\"";
            // line 275
            echo twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 275);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "mtoBaseIsc", [], "any", false, false, false, 275)]);
            echo "</cbc:TaxableAmount>
            <cbc:TaxAmount currencyID=\"";
            // line 276
            echo twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 276);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "mtoISC", [], "any", false, false, false, 276)]);
            echo "</cbc:TaxAmount>
            <cac:TaxCategory>
                <cac:TaxScheme>
                    <cbc:ID>2000</cbc:ID>
                    <cbc:Name>ISC</cbc:Name>
                    <cbc:TaxTypeCode>EXC</cbc:TaxTypeCode>
                </cac:TaxScheme>
            </cac:TaxCategory>
        </cac:TaxSubtotal>
        ";
        }
        // line 286
        echo "        ";
        if (twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "mtoOperGravadas", [], "any", false, false, false, 286)) {
            // line 287
            echo "        <cac:TaxSubtotal>
            <cbc:TaxableAmount currencyID=\"";
            // line 288
            echo twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 288);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "mtoOperGravadas", [], "any", false, false, false, 288)]);
            echo "</cbc:TaxableAmount>
            <cbc:TaxAmount currencyID=\"";
            // line 289
            echo twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 289);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "mtoIGV", [], "any", false, false, false, 289)]);
            echo "</cbc:TaxAmount>
            <cac:TaxCategory>
                <cac:TaxScheme>
                    <cbc:ID>1000</cbc:ID>
                    <cbc:Name>IGV</cbc:Name>
                    <cbc:TaxTypeCode>VAT</cbc:TaxTypeCode>
                </cac:TaxScheme>
            </cac:TaxCategory>
        </cac:TaxSubtotal>
        ";
        }
        // line 299
        echo "        ";
        if (twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "mtoOperInafectas", [], "any", false, false, false, 299)) {
            // line 300
            echo "            <cac:TaxSubtotal>
                <cbc:TaxableAmount currencyID=\"";
            // line 301
            echo twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 301);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "mtoOperInafectas", [], "any", false, false, false, 301)]);
            echo "</cbc:TaxableAmount>
                <cbc:TaxAmount currencyID=\"";
            // line 302
            echo twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 302);
            echo "\">0</cbc:TaxAmount>
                <cac:TaxCategory>
                    <cac:TaxScheme>
                        <cbc:ID>9998</cbc:ID>
                        <cbc:Name>INA</cbc:Name>
                        <cbc:TaxTypeCode>FRE</cbc:TaxTypeCode>
                    </cac:TaxScheme>
                </cac:TaxCategory>
            </cac:TaxSubtotal>
        ";
        }
        // line 312
        echo "        ";
        if (twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "mtoOperExoneradas", [], "any", false, false, false, 312)) {
            // line 313
            echo "            <cac:TaxSubtotal>
                <cbc:TaxableAmount currencyID=\"";
            // line 314
            echo twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 314);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "mtoOperExoneradas", [], "any", false, false, false, 314)]);
            echo "</cbc:TaxableAmount>
                <cbc:TaxAmount currencyID=\"";
            // line 315
            echo twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 315);
            echo "\">0</cbc:TaxAmount>
                <cac:TaxCategory>
                    <cac:TaxScheme>
                        <cbc:ID>9997</cbc:ID>
                        <cbc:Name>EXO</cbc:Name>
                        <cbc:TaxTypeCode>VAT</cbc:TaxTypeCode>
                    </cac:TaxScheme>
                </cac:TaxCategory>
            </cac:TaxSubtotal>
        ";
        }
        // line 325
        echo "        ";
        if (twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "mtoOperGratuitas", [], "any", false, false, false, 325)) {
            // line 326
            echo "            <cac:TaxSubtotal>
                <cbc:TaxableAmount currencyID=\"";
            // line 327
            echo twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 327);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "mtoOperGratuitas", [], "any", false, false, false, 327)]);
            echo "</cbc:TaxableAmount>
                <cbc:TaxAmount currencyID=\"";
            // line 328
            echo twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 328);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "mtoIGV", [], "any", false, false, false, 328)]);
            echo "</cbc:TaxAmount>
                <cac:TaxCategory>
                    <cac:TaxScheme>
                        <cbc:ID>9996</cbc:ID>
                        <cbc:Name>GRA</cbc:Name>
                        <cbc:TaxTypeCode>FRE</cbc:TaxTypeCode>
                    </cac:TaxScheme>
                </cac:TaxCategory>
            </cac:TaxSubtotal>
        ";
        }
        // line 338
        echo "        ";
        if (twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "mtoOperExportacion", [], "any", false, false, false, 338)) {
            // line 339
            echo "            <cac:TaxSubtotal>
                <cbc:TaxableAmount currencyID=\"";
            // line 340
            echo twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 340);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "mtoOperExportacion", [], "any", false, false, false, 340)]);
            echo "</cbc:TaxableAmount>
                <cbc:TaxAmount currencyID=\"";
            // line 341
            echo twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 341);
            echo "\">0</cbc:TaxAmount>
                <cac:TaxCategory>
                    <cac:TaxScheme>
                        <cbc:ID>9995</cbc:ID>
                        <cbc:Name>EXP</cbc:Name>
                        <cbc:TaxTypeCode>FRE</cbc:TaxTypeCode>
                    </cac:TaxScheme>
                </cac:TaxCategory>
            </cac:TaxSubtotal>
        ";
        }
        // line 351
        echo "        ";
        if (twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "mtoIvap", [], "any", false, false, false, 351)) {
            // line 352
            echo "        <cac:TaxSubtotal>
            <cbc:TaxableAmount currencyID=\"";
            // line 353
            echo twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 353);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "mtoBaseIvap", [], "any", false, false, false, 353)]);
            echo "</cbc:TaxableAmount>
            <cbc:TaxAmount currencyID=\"";
            // line 354
            echo twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 354);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "mtoIvap", [], "any", false, false, false, 354)]);
            echo "</cbc:TaxAmount>
            <cac:TaxCategory>
                <cac:TaxScheme>
                    <cbc:ID>1016</cbc:ID>
                    <cbc:Name>IVAP</cbc:Name>
                    <cbc:TaxTypeCode>VAT</cbc:TaxTypeCode>
                </cac:TaxScheme>
            </cac:TaxCategory>
        </cac:TaxSubtotal>
        ";
        }
        // line 364
        echo "        ";
        if (twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "mtoOtrosTributos", [], "any", false, false, false, 364)) {
            // line 365
            echo "        <cac:TaxSubtotal>
            <cbc:TaxableAmount currencyID=\"";
            // line 366
            echo twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 366);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "mtoBaseOth", [], "any", false, false, false, 366)]);
            echo "</cbc:TaxableAmount>
            <cbc:TaxAmount currencyID=\"";
            // line 367
            echo twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 367);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "mtoOtrosTributos", [], "any", false, false, false, 367)]);
            echo "</cbc:TaxAmount>
            <cac:TaxCategory>
                <cac:TaxScheme>
                    <cbc:ID>9999</cbc:ID>
                    <cbc:Name>OTROS</cbc:Name>
                    <cbc:TaxTypeCode>OTH</cbc:TaxTypeCode>
                </cac:TaxScheme>
            </cac:TaxCategory>
        </cac:TaxSubtotal>
        ";
        }
        // line 377
        echo "        ";
        if (twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "icbper", [], "any", false, false, false, 377)) {
            // line 378
            echo "            <cac:TaxSubtotal>
                <cbc:TaxAmount currencyID=\"";
            // line 379
            echo twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 379);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "icbper", [], "any", false, false, false, 379)]);
            echo "</cbc:TaxAmount>
                <cac:TaxCategory>
                    <cac:TaxScheme>
                        <cbc:ID>7152</cbc:ID>
                        <cbc:Name>ICBPER</cbc:Name>
                        <cbc:TaxTypeCode>OTH</cbc:TaxTypeCode>
                    </cac:TaxScheme>
                </cac:TaxCategory>
            </cac:TaxSubtotal>
        ";
        }
        // line 389
        echo "    </cac:TaxTotal>
    <cac:LegalMonetaryTotal>
        <cbc:LineExtensionAmount currencyID=\"";
        // line 391
        echo twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 391);
        echo "\">";
        echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "valorVenta", [], "any", false, false, false, 391)]);
        echo "</cbc:LineExtensionAmount>
        ";
        // line 392
        if (twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "subTotal", [], "any", false, false, false, 392)) {
            // line 393
            echo "        <cbc:TaxInclusiveAmount currencyID=\"";
            echo twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 393);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "subTotal", [], "any", false, false, false, 393)]);
            echo "</cbc:TaxInclusiveAmount>
        ";
        }
        // line 395
        echo "        ";
        if (twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "mtoDescuentos", [], "any", false, false, false, 395)) {
            // line 396
            echo "        <cbc:AllowanceTotalAmount currencyID=\"";
            echo twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 396);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "mtoDescuentos", [], "any", false, false, false, 396)]);
            echo "</cbc:AllowanceTotalAmount>
        ";
        }
        // line 398
        echo "        ";
        if (twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "sumOtrosCargos", [], "any", false, false, false, 398)) {
            // line 399
            echo "        <cbc:ChargeTotalAmount currencyID=\"";
            echo twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 399);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "sumOtrosCargos", [], "any", false, false, false, 399)]);
            echo "</cbc:ChargeTotalAmount>
        ";
        }
        // line 401
        echo "        ";
        if (twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "totalAnticipos", [], "any", false, false, false, 401)) {
            // line 402
            echo "        <cbc:PrepaidAmount currencyID=\"";
            echo twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 402);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "totalAnticipos", [], "any", false, false, false, 402)]);
            echo "</cbc:PrepaidAmount>
        ";
        }
        // line 404
        echo "        ";
        if (twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "redondeo", [], "any", false, false, false, 404)) {
            // line 405
            echo "        <cbc:PayableRoundingAmount currencyID=\"";
            echo twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 405);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "redondeo", [], "any", false, false, false, 405)]);
            echo "</cbc:PayableRoundingAmount>
        ";
        }
        // line 407
        echo "        <cbc:PayableAmount currencyID=\"";
        echo twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 407);
        echo "\">";
        echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "mtoImpVenta", [], "any", false, false, false, 407)]);
        echo "</cbc:PayableAmount>
    </cac:LegalMonetaryTotal>
    ";
        // line 409
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "details", [], "any", false, false, false, 409));
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["detail"]) {
            // line 410
            echo "    <cac:InvoiceLine>
        <cbc:ID>";
            // line 411
            echo twig_get_attribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 411);
            echo "</cbc:ID>
        <cbc:InvoicedQuantity unitCode=\"";
            // line 412
            echo twig_get_attribute($this->env, $this->source, $context["detail"], "unidad", [], "any", false, false, false, 412);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["detail"], "cantidad", [], "any", false, false, false, 412);
            echo "</cbc:InvoicedQuantity>
        <cbc:LineExtensionAmount currencyID=\"";
            // line 413
            echo twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 413);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [twig_get_attribute($this->env, $this->source, $context["detail"], "mtoValorVenta", [], "any", false, false, false, 413)]);
            echo "</cbc:LineExtensionAmount>
        <cac:PricingReference>
            ";
            // line 415
            if (twig_get_attribute($this->env, $this->source, $context["detail"], "mtoValorGratuito", [], "any", false, false, false, 415)) {
                // line 416
                echo "            <cac:AlternativeConditionPrice>
                <cbc:PriceAmount currencyID=\"";
                // line 417
                echo twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 417);
                echo "\">";
                echo call_user_func_array($this->env->getFilter('n_format_limit')->getCallable(), [twig_get_attribute($this->env, $this->source, $context["detail"], "mtoValorGratuito", [], "any", false, false, false, 417), 10]);
                echo "</cbc:PriceAmount>
                <cbc:PriceTypeCode>02</cbc:PriceTypeCode>
            </cac:AlternativeConditionPrice>
            ";
            } else {
                // line 421
                echo "            <cac:AlternativeConditionPrice>
                <cbc:PriceAmount currencyID=\"";
                // line 422
                echo twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 422);
                echo "\">";
                echo call_user_func_array($this->env->getFilter('n_format_limit')->getCallable(), [twig_get_attribute($this->env, $this->source, $context["detail"], "mtoPrecioUnitario", [], "any", false, false, false, 422), 10]);
                echo "</cbc:PriceAmount>
                <cbc:PriceTypeCode>01</cbc:PriceTypeCode>
            </cac:AlternativeConditionPrice>
            ";
            }
            // line 426
            echo "        </cac:PricingReference>
        ";
            // line 427
            if (twig_get_attribute($this->env, $this->source, $context["detail"], "cargos", [], "any", false, false, false, 427)) {
                // line 428
                echo "        ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["detail"], "cargos", [], "any", false, false, false, 428));
                foreach ($context['_seq'] as $context["_key"] => $context["cargo"]) {
                    // line 429
                    echo "        <cac:AllowanceCharge>
            <cbc:ChargeIndicator>true</cbc:ChargeIndicator>
            <cbc:AllowanceChargeReasonCode>";
                    // line 431
                    echo twig_get_attribute($this->env, $this->source, $context["cargo"], "codTipo", [], "any", false, false, false, 431);
                    echo "</cbc:AllowanceChargeReasonCode>
            <cbc:MultiplierFactorNumeric>";
                    // line 432
                    echo twig_get_attribute($this->env, $this->source, $context["cargo"], "factor", [], "any", false, false, false, 432);
                    echo "</cbc:MultiplierFactorNumeric>
            <cbc:Amount currencyID=\"";
                    // line 433
                    echo twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 433);
                    echo "\">";
                    echo twig_get_attribute($this->env, $this->source, $context["cargo"], "monto", [], "any", false, false, false, 433);
                    echo "</cbc:Amount>
            <cbc:BaseAmount currencyID=\"";
                    // line 434
                    echo twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 434);
                    echo "\">";
                    echo twig_get_attribute($this->env, $this->source, $context["cargo"], "montoBase", [], "any", false, false, false, 434);
                    echo "</cbc:BaseAmount>
        </cac:AllowanceCharge>
        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cargo'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 437
                echo "        ";
            }
            // line 438
            echo "        ";
            if (twig_get_attribute($this->env, $this->source, $context["detail"], "descuentos", [], "any", false, false, false, 438)) {
                // line 439
                echo "        ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["detail"], "descuentos", [], "any", false, false, false, 439));
                foreach ($context['_seq'] as $context["_key"] => $context["desc"]) {
                    // line 440
                    echo "        <cac:AllowanceCharge>
            <cbc:ChargeIndicator>false</cbc:ChargeIndicator>
            <cbc:AllowanceChargeReasonCode>";
                    // line 442
                    echo twig_get_attribute($this->env, $this->source, $context["desc"], "codTipo", [], "any", false, false, false, 442);
                    echo "</cbc:AllowanceChargeReasonCode>
            <cbc:MultiplierFactorNumeric>";
                    // line 443
                    echo twig_get_attribute($this->env, $this->source, $context["desc"], "factor", [], "any", false, false, false, 443);
                    echo "</cbc:MultiplierFactorNumeric>
            <cbc:Amount currencyID=\"";
                    // line 444
                    echo twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 444);
                    echo "\">";
                    echo twig_get_attribute($this->env, $this->source, $context["desc"], "monto", [], "any", false, false, false, 444);
                    echo "</cbc:Amount>
            <cbc:BaseAmount currencyID=\"";
                    // line 445
                    echo twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 445);
                    echo "\">";
                    echo twig_get_attribute($this->env, $this->source, $context["desc"], "montoBase", [], "any", false, false, false, 445);
                    echo "</cbc:BaseAmount>
        </cac:AllowanceCharge>
        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['desc'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 448
                echo "        ";
            }
            // line 449
            echo "        <cac:TaxTotal>
            <cbc:TaxAmount currencyID=\"";
            // line 450
            echo twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 450);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [twig_get_attribute($this->env, $this->source, $context["detail"], "totalImpuestos", [], "any", false, false, false, 450)]);
            echo "</cbc:TaxAmount>
            ";
            // line 451
            if (twig_get_attribute($this->env, $this->source, $context["detail"], "isc", [], "any", false, false, false, 451)) {
                // line 452
                echo "            <cac:TaxSubtotal>
                <cbc:TaxableAmount currencyID=\"";
                // line 453
                echo twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 453);
                echo "\">";
                echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [twig_get_attribute($this->env, $this->source, $context["detail"], "mtoBaseIsc", [], "any", false, false, false, 453)]);
                echo "</cbc:TaxableAmount>
                <cbc:TaxAmount currencyID=\"";
                // line 454
                echo twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 454);
                echo "\">";
                echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [twig_get_attribute($this->env, $this->source, $context["detail"], "isc", [], "any", false, false, false, 454)]);
                echo "</cbc:TaxAmount>
                <cac:TaxCategory>
                    <cbc:Percent>";
                // line 456
                echo twig_get_attribute($this->env, $this->source, $context["detail"], "porcentajeIsc", [], "any", false, false, false, 456);
                echo "</cbc:Percent>
                    <cbc:TierRange>";
                // line 457
                echo twig_get_attribute($this->env, $this->source, $context["detail"], "tipSisIsc", [], "any", false, false, false, 457);
                echo "</cbc:TierRange>
                    <cac:TaxScheme>
                        <cbc:ID>2000</cbc:ID>
                        <cbc:Name>ISC</cbc:Name>
                        <cbc:TaxTypeCode>EXC</cbc:TaxTypeCode>
                    </cac:TaxScheme>
                </cac:TaxCategory>
            </cac:TaxSubtotal>
            ";
            }
            // line 466
            echo "            <cac:TaxSubtotal>
                <cbc:TaxableAmount currencyID=\"";
            // line 467
            echo twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 467);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [twig_get_attribute($this->env, $this->source, $context["detail"], "mtoBaseIgv", [], "any", false, false, false, 467)]);
            echo "</cbc:TaxableAmount>
                <cbc:TaxAmount currencyID=\"";
            // line 468
            echo twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 468);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [twig_get_attribute($this->env, $this->source, $context["detail"], "igv", [], "any", false, false, false, 468)]);
            echo "</cbc:TaxAmount>
                <cac:TaxCategory>
                    <cbc:Percent>";
            // line 470
            echo twig_get_attribute($this->env, $this->source, $context["detail"], "porcentajeIgv", [], "any", false, false, false, 470);
            echo "</cbc:Percent>
                    <cbc:TaxExemptionReasonCode>";
            // line 471
            echo twig_get_attribute($this->env, $this->source, $context["detail"], "tipAfeIgv", [], "any", false, false, false, 471);
            echo "</cbc:TaxExemptionReasonCode>
                    ";
            // line 472
            $context["afect"] = Greenter\Xml\Filter\TributoFunction::getByAfectacion(twig_get_attribute($this->env, $this->source, $context["detail"], "tipAfeIgv", [], "any", false, false, false, 472));
            // line 473
            echo "                    <cac:TaxScheme>
                        <cbc:ID>";
            // line 474
            echo twig_get_attribute($this->env, $this->source, ($context["afect"] ?? null), "id", [], "any", false, false, false, 474);
            echo "</cbc:ID>
                        <cbc:Name>";
            // line 475
            echo twig_get_attribute($this->env, $this->source, ($context["afect"] ?? null), "name", [], "any", false, false, false, 475);
            echo "</cbc:Name>
                        <cbc:TaxTypeCode>";
            // line 476
            echo twig_get_attribute($this->env, $this->source, ($context["afect"] ?? null), "code", [], "any", false, false, false, 476);
            echo "</cbc:TaxTypeCode>
                    </cac:TaxScheme>
                </cac:TaxCategory>
            </cac:TaxSubtotal>
            ";
            // line 480
            if (twig_get_attribute($this->env, $this->source, $context["detail"], "otroTributo", [], "any", false, false, false, 480)) {
                // line 481
                echo "                <cac:TaxSubtotal>
                    <cbc:TaxableAmount currencyID=\"";
                // line 482
                echo twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 482);
                echo "\">";
                echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [twig_get_attribute($this->env, $this->source, $context["detail"], "mtoBaseOth", [], "any", false, false, false, 482)]);
                echo "</cbc:TaxableAmount>
                    <cbc:TaxAmount currencyID=\"";
                // line 483
                echo twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 483);
                echo "\">";
                echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [twig_get_attribute($this->env, $this->source, $context["detail"], "otroTributo", [], "any", false, false, false, 483)]);
                echo "</cbc:TaxAmount>
                    <cac:TaxCategory>
                        <cbc:Percent>";
                // line 485
                echo twig_get_attribute($this->env, $this->source, $context["detail"], "porcentajeOth", [], "any", false, false, false, 485);
                echo "</cbc:Percent>
                        <cac:TaxScheme>
                            <cbc:ID>9999</cbc:ID>
                            <cbc:Name>OTROS</cbc:Name>
                            <cbc:TaxTypeCode>OTH</cbc:TaxTypeCode>
                        </cac:TaxScheme>
                    </cac:TaxCategory>
                </cac:TaxSubtotal>
            ";
            }
            // line 494
            echo "            ";
            if (twig_get_attribute($this->env, $this->source, $context["detail"], "icbper", [], "any", false, false, false, 494)) {
                // line 495
                echo "            <cac:TaxSubtotal>
                <cbc:TaxAmount currencyID=\"";
                // line 496
                echo twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 496);
                echo "\">";
                echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [twig_get_attribute($this->env, $this->source, $context["detail"], "icbper", [], "any", false, false, false, 496)]);
                echo "</cbc:TaxAmount>
                <cbc:BaseUnitMeasure unitCode=\"";
                // line 497
                echo twig_get_attribute($this->env, $this->source, $context["detail"], "unidad", [], "any", false, false, false, 497);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["detail"], "cantidad", [], "any", false, false, false, 497);
                echo "</cbc:BaseUnitMeasure>
                <cbc:PerUnitAmount currencyID=\"";
                // line 498
                echo twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 498);
                echo "\">";
                echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [twig_get_attribute($this->env, $this->source, $context["detail"], "factorIcbper", [], "any", false, false, false, 498)]);
                echo "</cbc:PerUnitAmount>
                <cac:TaxCategory>
                    <cac:TaxScheme>
                        <cbc:ID>7152</cbc:ID>
                        <cbc:Name>ICBPER</cbc:Name>
                        <cbc:TaxTypeCode>OTH</cbc:TaxTypeCode>
                    </cac:TaxScheme>
                </cac:TaxCategory>
            </cac:TaxSubtotal>
            ";
            }
            // line 508
            echo "        </cac:TaxTotal>
        <cac:Item>
            <cbc:Description><![CDATA[";
            // line 510
            echo twig_get_attribute($this->env, $this->source, $context["detail"], "descripcion", [], "any", false, false, false, 510);
            echo "]]></cbc:Description>
            ";
            // line 511
            if (twig_get_attribute($this->env, $this->source, $context["detail"], "codProducto", [], "any", false, false, false, 511)) {
                // line 512
                echo "            <cac:SellersItemIdentification>
                <cbc:ID>";
                // line 513
                echo twig_get_attribute($this->env, $this->source, $context["detail"], "codProducto", [], "any", false, false, false, 513);
                echo "</cbc:ID>
            </cac:SellersItemIdentification>
            ";
            }
            // line 516
            echo "            ";
            if (twig_get_attribute($this->env, $this->source, $context["detail"], "codProdSunat", [], "any", false, false, false, 516)) {
                // line 517
                echo "            <cac:CommodityClassification>
                <cbc:ItemClassificationCode>";
                // line 518
                echo twig_get_attribute($this->env, $this->source, $context["detail"], "codProdSunat", [], "any", false, false, false, 518);
                echo "</cbc:ItemClassificationCode>
            </cac:CommodityClassification>
            ";
            }
            // line 521
            echo "            ";
            if (twig_get_attribute($this->env, $this->source, $context["detail"], "codProdGS1", [], "any", false, false, false, 521)) {
                // line 522
                echo "            <cac:StandardItemIdentification>
                <cbc:ID>";
                // line 523
                echo twig_get_attribute($this->env, $this->source, $context["detail"], "codProdGS1", [], "any", false, false, false, 523);
                echo "</cbc:ID>
            </cac:StandardItemIdentification>
            ";
            }
            // line 526
            echo "            ";
            if (twig_get_attribute($this->env, $this->source, $context["detail"], "atributos", [], "any", false, false, false, 526)) {
                // line 527
                echo "                ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["detail"], "atributos", [], "any", false, false, false, 527));
                foreach ($context['_seq'] as $context["_key"] => $context["atr"]) {
                    // line 528
                    echo "                    <cac:AdditionalItemProperty >
                        <cbc:Name>";
                    // line 529
                    echo twig_get_attribute($this->env, $this->source, $context["atr"], "name", [], "any", false, false, false, 529);
                    echo "</cbc:Name>
                        <cbc:NameCode>";
                    // line 530
                    echo twig_get_attribute($this->env, $this->source, $context["atr"], "code", [], "any", false, false, false, 530);
                    echo "</cbc:NameCode>
                        ";
                    // line 531
                    if (twig_get_attribute($this->env, $this->source, $context["atr"], "value", [], "any", false, false, false, 531)) {
                        // line 532
                        echo "                        <cbc:Value>";
                        echo twig_get_attribute($this->env, $this->source, $context["atr"], "value", [], "any", false, false, false, 532);
                        echo "</cbc:Value>
                        ";
                    }
                    // line 534
                    echo "                        ";
                    if (((twig_get_attribute($this->env, $this->source, $context["atr"], "fecInicio", [], "any", false, false, false, 534) || twig_get_attribute($this->env, $this->source, $context["atr"], "fecFin", [], "any", false, false, false, 534)) || twig_get_attribute($this->env, $this->source, $context["atr"], "duracion", [], "any", false, false, false, 534))) {
                        // line 535
                        echo "                            <cac:UsabilityPeriod>
                                ";
                        // line 536
                        if (twig_get_attribute($this->env, $this->source, $context["atr"], "fecInicio", [], "any", false, false, false, 536)) {
                            // line 537
                            echo "                                <cbc:StartDate>";
                            echo twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["atr"], "fecInicio", [], "any", false, false, false, 537), "Y-m-d");
                            echo "</cbc:StartDate>
                                ";
                        }
                        // line 539
                        echo "                                ";
                        if (twig_get_attribute($this->env, $this->source, $context["atr"], "fecFin", [], "any", false, false, false, 539)) {
                            // line 540
                            echo "                                <cbc:EndDate>";
                            echo twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["atr"], "fecFin", [], "any", false, false, false, 540), "Y-m-d");
                            echo "</cbc:EndDate>
                                ";
                        }
                        // line 542
                        echo "                                ";
                        if (twig_get_attribute($this->env, $this->source, $context["atr"], "duracion", [], "any", false, false, false, 542)) {
                            // line 543
                            echo "                                <cbc:DurationMeasure unitCode=\"DAY\">";
                            echo twig_get_attribute($this->env, $this->source, $context["atr"], "duracion", [], "any", false, false, false, 543);
                            echo "</cbc:DurationMeasure>
                                ";
                        }
                        // line 545
                        echo "                            </cac:UsabilityPeriod>
                        ";
                    }
                    // line 547
                    echo "                    </cac:AdditionalItemProperty>
                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['atr'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 549
                echo "            ";
            }
            // line 550
            echo "        </cac:Item>
        <cac:Price>
            <cbc:PriceAmount currencyID=\"";
            // line 552
            echo twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 552);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format_limit')->getCallable(), [twig_get_attribute($this->env, $this->source, $context["detail"], "mtoValorUnitario", [], "any", false, false, false, 552), 10]);
            echo "</cbc:PriceAmount>
        </cac:Price>
    </cac:InvoiceLine>
    ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['detail'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 556
        echo "</Invoice>
";
        $___internal_0a8a71b22692c562cb89165d1b641c1224296a4a1de3894d515811d7960d0bcf_ = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 1
        echo twig_spaceless($___internal_0a8a71b22692c562cb89165d1b641c1224296a4a1de3894d515811d7960d0bcf_);
    }

    public function getTemplateName()
    {
        return "invoice2.1.xml.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1541 => 1,  1537 => 556,  1517 => 552,  1513 => 550,  1510 => 549,  1503 => 547,  1499 => 545,  1493 => 543,  1490 => 542,  1484 => 540,  1481 => 539,  1475 => 537,  1473 => 536,  1470 => 535,  1467 => 534,  1461 => 532,  1459 => 531,  1455 => 530,  1451 => 529,  1448 => 528,  1443 => 527,  1440 => 526,  1434 => 523,  1431 => 522,  1428 => 521,  1422 => 518,  1419 => 517,  1416 => 516,  1410 => 513,  1407 => 512,  1405 => 511,  1401 => 510,  1397 => 508,  1382 => 498,  1376 => 497,  1370 => 496,  1367 => 495,  1364 => 494,  1352 => 485,  1345 => 483,  1339 => 482,  1336 => 481,  1334 => 480,  1327 => 476,  1323 => 475,  1319 => 474,  1316 => 473,  1314 => 472,  1310 => 471,  1306 => 470,  1299 => 468,  1293 => 467,  1290 => 466,  1278 => 457,  1274 => 456,  1267 => 454,  1261 => 453,  1258 => 452,  1256 => 451,  1250 => 450,  1247 => 449,  1244 => 448,  1233 => 445,  1227 => 444,  1223 => 443,  1219 => 442,  1215 => 440,  1210 => 439,  1207 => 438,  1204 => 437,  1193 => 434,  1187 => 433,  1183 => 432,  1179 => 431,  1175 => 429,  1170 => 428,  1168 => 427,  1165 => 426,  1156 => 422,  1153 => 421,  1144 => 417,  1141 => 416,  1139 => 415,  1132 => 413,  1126 => 412,  1122 => 411,  1119 => 410,  1102 => 409,  1094 => 407,  1086 => 405,  1083 => 404,  1075 => 402,  1072 => 401,  1064 => 399,  1061 => 398,  1053 => 396,  1050 => 395,  1042 => 393,  1040 => 392,  1034 => 391,  1030 => 389,  1015 => 379,  1012 => 378,  1009 => 377,  994 => 367,  988 => 366,  985 => 365,  982 => 364,  967 => 354,  961 => 353,  958 => 352,  955 => 351,  942 => 341,  936 => 340,  933 => 339,  930 => 338,  915 => 328,  909 => 327,  906 => 326,  903 => 325,  890 => 315,  884 => 314,  881 => 313,  878 => 312,  865 => 302,  859 => 301,  856 => 300,  853 => 299,  838 => 289,  832 => 288,  829 => 287,  826 => 286,  811 => 276,  805 => 275,  802 => 274,  800 => 273,  794 => 272,  791 => 271,  785 => 268,  781 => 267,  777 => 266,  773 => 265,  769 => 263,  766 => 262,  763 => 261,  760 => 260,  749 => 257,  743 => 256,  739 => 255,  735 => 254,  731 => 252,  726 => 251,  723 => 250,  720 => 249,  709 => 246,  703 => 245,  699 => 244,  695 => 243,  691 => 241,  686 => 240,  683 => 239,  680 => 238,  661 => 235,  657 => 234,  654 => 233,  636 => 232,  633 => 231,  627 => 228,  623 => 226,  620 => 225,  614 => 222,  610 => 221,  606 => 220,  599 => 216,  594 => 214,  591 => 213,  588 => 212,  585 => 211,  576 => 205,  570 => 202,  565 => 200,  561 => 199,  556 => 198,  550 => 196,  548 => 195,  544 => 194,  539 => 191,  536 => 190,  533 => 189,  528 => 186,  524 => 184,  518 => 182,  515 => 181,  509 => 179,  507 => 178,  504 => 177,  502 => 176,  499 => 175,  492 => 171,  486 => 168,  483 => 167,  477 => 165,  475 => 164,  472 => 163,  469 => 162,  467 => 161,  463 => 160,  455 => 157,  450 => 154,  447 => 153,  445 => 152,  441 => 150,  437 => 148,  431 => 146,  428 => 145,  422 => 143,  420 => 142,  417 => 141,  415 => 140,  412 => 139,  405 => 135,  399 => 132,  396 => 131,  390 => 129,  388 => 128,  385 => 127,  382 => 126,  380 => 125,  376 => 124,  368 => 121,  363 => 118,  361 => 117,  357 => 115,  353 => 113,  347 => 111,  344 => 110,  338 => 108,  336 => 107,  333 => 106,  331 => 105,  324 => 101,  318 => 98,  313 => 96,  309 => 95,  304 => 94,  298 => 92,  296 => 91,  292 => 90,  288 => 89,  285 => 88,  283 => 87,  279 => 86,  273 => 83,  267 => 80,  252 => 68,  246 => 65,  240 => 62,  237 => 61,  234 => 60,  215 => 55,  209 => 52,  205 => 51,  201 => 50,  198 => 49,  180 => 48,  177 => 47,  174 => 46,  165 => 43,  161 => 42,  158 => 41,  153 => 40,  150 => 39,  147 => 38,  138 => 35,  134 => 34,  131 => 33,  126 => 32,  123 => 31,  117 => 28,  114 => 27,  112 => 26,  107 => 25,  101 => 23,  98 => 22,  87 => 20,  83 => 19,  76 => 18,  70 => 16,  68 => 15,  64 => 14,  60 => 13,  54 => 12,  50 => 10,  48 => 9,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "invoice2.1.xml.twig", "C:\\xampp\\htdocs\\facturaDemo\\Model\\greenterFiles\\vendor\\greenter\\xml\\src\\Xml\\Templates\\invoice2.1.xml.twig");
    }
}

<?php
use Greenter\Model\Company\Company;
use Greenter\Model\Company\Address;
use Greenter\Ws\Services\SunatEndpoints;
use Greenter\See;
require __DIR__.'\src\Util.php';

final class Configure
{
	private static $current;
    public $see;
	public $company;

    private function __construct()
    {
    	// CLAVE SOL utilizada.
		// Ruc: 20000000001
		// Usuario: MODDATOS
		// Contraseña: moddatos
        $this->see = new See();
		$this->see->setService(SunatEndpoints::FE_BETA);
		$this->see->setCertificate(file_get_contents(__DIR__.'/certificate.pem'));
		$this->see->setCredentials('20000000001MODDATOS'/*ruc+usuario*/, 'moddatos');

		// Emisor
		$address = new Address();
		$address->setUbigueo('150101')
		    ->setDepartamento('LIMA')
		    ->setProvincia('LIMA')
		    ->setDistrito('LIMA')
		    ->setUrbanizacion('-')
		    ->setDireccion('AV LOS GERUNDIOS');

		$this->company = new Company();
		$this->company->setRuc('20000000001')
		    ->setRazonSocial('EMPRESA SAC')
		    ->setNombreComercial('EMPRESA')
		    ->setAddress($address);
    }

    public static function getInstance()
    {
        if (!self::$current instanceof self) {
            self::$current = new self();
        }

        return self::$current;
    }


    public function getSee()
    {
        return $this->see;
    }

    public function getCompany()
    {
        return $this->company;
    }

    public function getUtil()
    {
        return Util::getInstance();
    }
}
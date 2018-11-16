<?php

namespace common\models;
use Yii;


/**
 * This is the model class for table "payments".
 *
 * @property integer $id
 * @property integer $uid
 * @property integer $amount
 * @property string $receipt_no
 * @property string $transaction_id
 * @property string $phone_no
 * @property string $payment_method
 * @property string $transaction_status
 * @property string $transaction_date
 * @property integer $withdrawal_status
 * @property string $date_created
 *
 * @property User $u
 */
class Payments extends \yii\db\ActiveRecord
{    
    private static $_instance=null;
    
    private $ENDPOINT;
    private $CALL_BACK_METHOD;
    private $CALLBACK_URL;
    
    private $RESPONSE_BODY;
    private $PRODUCT_ID;
    private $MERCHANT_ID;
    private $PASS_KEY;
    
    private $PASSWORD;
    private $TIMESTAMP;
    private $AMOUNT;
    private $NUMBER;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'payments';
    }
    
    /*Singleton Declaration */
    public static function getInstance()
    {
        $class = get_class();
        if(!($class::$_instance instanceof $class))
        {
            $class::$_instance = new $class;
        }
        return $class::$_instance;
    }
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid', 'amount', 'phone_no', 'payment_method', 'transaction_status'], 'required'],
            [['uid', 'amount', 'withdrawal_status'], 'integer'],
            [['transaction_date', 'date_created'], 'safe'],
            [['receipt_no', 'payment_method'], 'string', 'max' => 100],
            [['transaction_id'], 'string', 'max' => 255],
            [['phone_no', 'transaction_status'], 'string', 'max' => 20],
            [['uid'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['uid' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'uid' => 'Uid',
            'amount' => 'Amount',
            'receipt_no' => 'Receipt No',
            'transaction_id' => 'Transaction ID',
            'phone_no' => 'Phone No',
            'payment_method' => 'Payment Method',
            'transaction_status' => 'Transaction Status',
            'transaction_date' => 'Transaction Date',
            'withdrawal_status' => 'Withdrawal Status',
            'date_created' => 'Date Created',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getU()
    {
        return $this->hasOne(User::className(), ['id' => 'uid']);
    }
    public function endPoint($ENDPOINT=null)
    {
        $this->ENDPOINT = $ENDPOINT? $ENDPOINT : $this->ENDPOINT;
        return $this->ENDPOINT;
    }
    
    public function callbackUrl($CALLBACK_URL=null)
    {
        $this->CALLBACK_URL = $CALLBACK_URL? $CALLBACK_URL : $this->CALLBACK_URL;
        return $this->CALLBACK_URL;
    }
    
    public function callbackMethod($CALL_BACK_METHOD='POST')
    {
        $this->CALL_BACK_METHOD = $CALL_BACK_METHOD? $CALL_BACK_METHOD : $this->CALL_BACK_METHOD;
        return $this->CALL_BACK_METHOD;
    }
    
    public function merchantID($MERCHANT_ID=null)
    {
        $this->MERCHANT_ID = $MERCHANT_ID? $MERCHANT_ID : $this->MERCHANT_ID;
        return $this->MERCHANT_ID;
    }
    
    public function passwordKey($PASS_KEY=null)
    {
        $this->PASSKEY = $PASS_KEY? $PASS_KEY : $this->PASSKEY;
        return $this->PASSKEY;
    }
    
    public function timestamp($TIMESTAMP=null)
    {
        $this->TIMESTAMP = $TIMESTAMP? $TIMESTAMP : $this->TIMESTAMP;
        return $this->TIMESTAMP;
    }
    
    public function password($PASSWORD=null)
    {
        $this->PASSWORD = $PASSWORD? $PASSWORD : $this->PASSWORD;
        return $this->PASSWORD;
    }
    
    public function productID($PRODUCT_ID=null)
    {
        $this->PRODUCT_ID = $PRODUCT_ID? $PRODUCT_ID : $this->PRODUCT_ID;
        return $this->PRODUCT_ID;
    }
    
    public function responseBody($RESPONSE_BODY=null)
    {
        $this->RESPONSE_BODY = $RESPONSE_BODY? $RESPONSE_BODY : $this->RESPONSE_BODY;
        return $this->RESPONSE_BODY;
    }
    
    /**
     * @method generateRandomString()
     * @param int $length number of characters of generated result
     * @desc random id generator(). it generates random alphanumeric string of chosen length
     */
    public function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    
    
    /**
     * @method xmlToJson()
     * @desc convert soap xml to json array
     */
    public function xmlToJson($soapXML)
    {
        $plainXML = $this->mungXML($soapXML);
        $results = json_decode(json_encode(SimpleXML_Load_String($plainXML, 'SimpleXMLElement', LIBXML_NOCDATA)), true);
        return $results;
    }
    
    /**
     * @method mungXML
     * @desc Function To Mung The Xml So We Do Not Have To Deal With Namespace
     */
    private function mungXML($xml)
    {
        $obj = SimpleXML_Load_String($xml);
        if ($obj === FALSE) return $xml;
        
        // GET NAMESPACES, IF ANY
        $nss = $obj->getNamespaces(TRUE);
        if (empty($nss)) return $xml;
        
        // CHANGE ns: INTO ns_
        $nsm = array_keys($nss);
        foreach ($nsm as $key)
        {
            // A REGULAR EXPRESSION TO MUNG THE XML
            $rgx
            = '#'               // REGEX DELIMITER
            . '('               // GROUP PATTERN 1
            . '\<'              // LOCATE A LEFT WICKET
            . '/?'              // MAYBE FOLLOWED BY A SLASH
            . preg_quote($key)  // THE NAMESPACE
            . ')'               // END GROUP PATTERN
            . '('               // GROUP PATTERN 2
            . ':{1}'            // A COLON (EXACTLY ONE)
            . ')'               // END GROUP PATTERN
            . '#'               // REGEX DELIMITER
            ;
            // INSERT THE UNDERSCORE INTO THE TAG NAME
            $rep
            = '$1'          // BACKREFERENCE TO GROUP 1
            . '_'           // LITERAL UNDERSCORE IN PLACE OF GROUP 2
            ;
            // PERFORM THE REPLACEMENT
            $xml =  preg_replace($rgx, $rep, $xml);
        }
        return $xml;
    }
    
    
    /**
     * @method sendCurlRequest()
     * @param $end_point uri/url where request will be sent to
     * @param $body request body to be sent along
     * @desc silently run a remote request given uri/url
     * @return mixed $output
     */
    public function sendCurlRequest($BODY,$as_json=true)
    {
        $output = null;
        try
        {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $this->endPoint());
            curl_setopt($ch, CURLOPT_HEADER, 0);
            
            curl_setopt($ch, CURLOPT_VERBOSE, '0');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $BODY);
            
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, '0');
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, '0');
            
            $output = curl_exec($ch);
            curl_close($ch);
            
            if(is_object($ch) && curl_errno($ch))
            {
                $this->message('Request failed. Please try again.');
                $this->isError(true);
            }
        }
        catch(Exception $ex)
        {
            $this->message($ex->getMessage());
            $this->isError(true);
        }
        return ($as_json==true)? $this->xmlToJson($output) : $output;
    }
    
    /**
     * @method getResponse()
     * @desc Create response from mpesa soap response
     * @param array $response
     * @param string $request_type type of request as detailed in mpesa api
     * @return boolean
     */
    private function getResponse($response,$request_type)
    {
        //retrieve response body in json
        $res_body = ($response && isset($response['SOAP-ENV_Body'][$request_type]['RETURN_CODE']))?
        $response['SOAP-ENV_Body'][$request_type] : null;
        $failure_message = isset($res_body['DESCRIPTION'])? $res_body['DESCRIPTION'] : 'Mpesa Transaction Failed';
        $this->responseBody($res_body);
        
        if($request_type=='ns1_transactionStatusResponse')
        {
            $success = ($res_body['RETURN_CODE']=='00' && $res_body['TRX_STATUS']=='Success')? true : false;
            $this->message($success? $res_body['DESCRIPTION'] : $failure_message);
        }
        else
        {
            $success = $res_body['RETURN_CODE']=='00'? true : false;
            $this->message($res_body? $res_body['DESCRIPTION'] : $failure_message);
        }
        return $success;
    }
    
    /**
     * @desc initiate checkout request()
     * @param string $MERCHANT_TRANSACTION_ID
     * @param number $AMOUNT
     * @param string $NUMBER
     * @return boolean
     */
    public function requestCheckout($MERCHANT_TRANSACTION_ID,$AMOUNT,$NUMBER)
    {
        $PRODUCT_ID = $this->productID();
        $TIMESTAMP = $this->timestamp();
        $CALLBACK_URL = $this->callbackUrl();
        $CALL_BACK_METHOD = $this->callbackMethod();
        $PASSWORD = $this->password();
        $MERCHANT_ID = $this->merchantID();
        
        //compose soap xml body
        $BODY = '<soapenv:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:tns="tns:ns" xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/"xmlns:soapenc="http://schemas.xmlsoap.org/soap/encoding/">
					<soapenv:Header>
						<tns:CheckOutHeader>
							<MERCHANT_ID>'.$MERCHANT_ID.'</MERCHANT_ID>
							<PASSWORD>'.$PASSWORD.'</PASSWORD>
							<TIMESTAMP>'.$TIMESTAMP.'</TIMESTAMP>
						</tns:CheckOutHeader>
					</soapenv:Header>
					<soapenv:Body>
						<tns:processCheckOutRequest>
							<MERCHANT_TRANSACTION_ID>'.$MERCHANT_TRANSACTION_ID.'</MERCHANT_TRANSACTION_ID>
							<REFERENCE_ID>'.$PRODUCT_ID.'</REFERENCE_ID>
							<AMOUNT>'.$AMOUNT.'</AMOUNT>
							<MSISDN>'.$NUMBER.'</MSISDN>
							<ENC_PARAMS></ENC_PARAMS>
							<CALL_BACK_URL>'.$CALLBACK_URL.'</CALL_BACK_URL>
							<CALL_BACK_METHOD>'.$CALL_BACK_METHOD.'</CALL_BACK_METHOD>
							<TIMESTAMP>'.$TIMESTAMP.'</TIMESTAMP>
						</tns:processCheckOutRequest>
					</soapenv:Body>
				</soapenv:Envelope>';
        
        //run soap xml request and return response
        $response = $this->sendCurlRequest($BODY);
        return $this->getResponse($response, 'ns1_processCheckOutResponse');
    }
    
    /**
     *
     * @param string $MERCHANT_TRANSACTION_ID
     * @param string $ENDPOINT
     * @param string $PASSWORD
     * @param string $TIMESTAMP
     */
    public function confirmCheckout($MERCHANT_TRANSACTION_ID,$TRX_ID='?')
    {
        $TIMESTAMP = $this->timestamp();
        $PASSWORD = $this->password();
        $MERCHANT_ID = $this->merchantID();
        
        $BODY = '<soapenv:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:tns="tns:ns" xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:soapenc="http://schemas.xmlsoap.org/soap/encoding/">
					<soapenv:Header>
						<tns:CheckOutHeader>
							<MERCHANT_ID>'.$MERCHANT_ID.'</MERCHANT_ID>
							<PASSWORD>'.$PASSWORD.'</PASSWORD>
							<TIMESTAMP>'.$TIMESTAMP.'</TIMESTAMP>
						</tns:CheckOutHeader>
					</soapenv:Header>
					<soapenv:Body>
						<tns:transactionConfirmRequest>
							<TRX_ID>'.$MERCHANT_TRANSACTION_ID.'</TRX_ID>
							<MERCHANT_TRANSACTION_ID>'.$MERCHANT_TRANSACTION_ID.'</MERCHANT_TRANSACTION_ID>
						</tns:transactionConfirmRequest>
					</soapenv:Body>
				</soapenv:Envelope>';
        
        //run soap xml request and return response
        $response = $this->sendCurlRequest($BODY);
        return $this->getResponse($response, 'ns1_transactionConfirmResponse');
    }
    
    
    public function requestStatus($MERCHANT_TRANSACTION_ID,$TRX_ID='?')
    {
        $TIMESTAMP = $this->timestamp();
        $PASSWORD = $this->password();
        $MERCHANT_ID = $this->merchantID();
        
        //compose soap xml body
        $BODY = '<soapenv:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:tns="tns:ns" xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:soapenc="http://schemas.xmlsoap.org/soap/encoding/">
				   <soapenv:Header>
				      <tns:CheckOutHeader>
				           	<MERCHANT_ID>'.$MERCHANT_ID.'</MERCHANT_ID>
							<PASSWORD>'.$PASSWORD.'</PASSWORD>
							<TIMESTAMP>'.$TIMESTAMP.'</TIMESTAMP>
				      </tns:CheckOutHeader>
				   </soapenv:Header>
				   <soapenv:Body>
				      <tns:transactionStatusRequest>
				         <TRX_ID>'.$TRX_ID.'</TRX_ID>
				         <MERCHANT_TRANSACTION_ID>'.$MERCHANT_TRANSACTION_ID.'</MERCHANT_TRANSACTION_ID>
				      </tns:transactionStatusRequest>
				   </soapenv:Body>
				</soapenv:Envelope>';
        
        //run soap xml request and return response
        //check transaction status. do it recursively until expected results come
        do{
            $response = $this->sendCurlRequest($BODY);
            $success=$this->getResponse($response, 'ns1_transactionStatusResponse');
            $body = $this->responseBody();
            
            $receipt_no = isset($body['MPESA_TRX_ID'])? $body['MPESA_TRX_ID'] : null;
            $code = isset($body['RESULT_CODE'])? $body['RESULT_CODE'] : null;
            $trx_status = isset($body['TRX_STATUS'])? $body['TRX_STATUS'] : null;
            
            $status = ($code!='00' && !($trx_status=='Success' || $trx_status=='Failed'));
        }while($status);
        return $success;
    }
    
    public function message($message=null)
    {
        return $message;
        //$this->message = $message? $message : $this->message;
        //return $this->message;
    }	
}

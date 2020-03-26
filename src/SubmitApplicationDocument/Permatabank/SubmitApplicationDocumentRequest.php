<?php

namespace Assetku\BankService\SubmitApplicationDocument\Permatabank;

use Assetku\BankService\Base\Permatabank\BaseRequest;
use Assetku\BankService\Contracts\MustValidated;
use Assetku\BankService\Contracts\SubmitApplicationDocument\SubmitApplicationDocumentRequestContract;
use Assetku\BankService\Encoders\Permatabank\JsonEncoder;
use Assetku\BankService\Headers\Permatabank\CommonHeader;

class SubmitApplicationDocumentRequest extends BaseRequest implements SubmitApplicationDocumentRequestContract, MustValidated
{
    /**
     * @var array
     */
    protected $data;

    /**
     * @var string
     */
    protected $bankReferralId;

    /**
     * @var string
     */
    protected $documentType = 'KT';

    /**
     * @var string
     */
    protected $documentName = 'KTP.jpg';

    /**
     * @var string
     */
    protected $documentContent;

    /**
     * @var string
     */
    protected $documentContentType;

    /**
     * SubmitApplicationDocumentRequest constructor.
     *
     * @param  string  $bankReferralId
     * @param  string  $url
     */
    public function __construct(string $bankReferralId, string $url)
    {
        parent::__construct();

        $this->bankReferralId = $bankReferralId;

        $streamContext = [
            'ssl' => [
                'verify_peer'      => false,
                'verify_peer_name' => false,
            ],
        ];

        $documentContent = base64_encode(
            file_get_contents(
                $url,
                false,
                stream_context_create($streamContext)
            )
        );

        $this->documentContent = $documentContent;

        $this->documentContentType = 'image/jpeg';
    }

    /**
     * @inheritDoc
     */
    public function bankReferralId()
    {
        return $this->bankReferralId;
    }

    /**
     * @inheritDoc
     */
    public function documentType()
    {
        return $this->documentType;
    }

    /**
     * @inheritDoc
     */
    public function documentName()
    {
        return $this->documentName;
    }

    /**
     * @inheritDoc
     */
    public function documentContent()
    {
        return $this->documentContent;
    }

    /**
     * @inheritDoc
     */
    public function documentContentType()
    {
        return $this->documentContentType;
    }

    /**
     * @inheritDoc
     */
    public function uri()
    {
        return 'appldoc/add';
    }

    /**
     * @inheritDoc
     */
    public function encoder()
    {
        return new JsonEncoder;
    }

    /**
     * @inheritDoc
     */
    public function data()
    {
        return [
            'SubmitDocumentRq' => [
                'MsgRqHdr'     => [
                    'RequestTimestamp' => $this->timestamp,
                    'CustRefID'        => $this->customerReferralId,
                ],
                'DocumentInfo' => [
                    'BankReffId'     => $this->bankReferralId,
                    'DocType'        => $this->documentType,
                    'DocName'        => $this->documentName,
                    'DocContent'     => $this->documentContent,
                    'DocContentType' => $this->documentContentType,
                ],
            ],
        ];
    }

    /**
     * @inheritDoc
     */
    public function header()
    {
        return new CommonHeader($this);
    }

    /**
     * @inheritDoc
     */
    public function rules()
    {
        return [
            'SubmitDocumentRq'                             => 'required|array|size:2',
            'SubmitDocumentRq.MsgRqHdr'                    => 'required|array|size:2',
            'SubmitDocumentRq.MsgRqHdr.RequestTimestamp'   => 'required|string|date',
            'SubmitDocumentRq.MsgRqHdr.CustRefID'          => 'required|string|size:20',
            'SubmitDocumentRq.DocumentInfo'                => 'required|array|size:5',
            'SubmitDocumentRq.DocumentInfo.BankReffId'     => 'required|string',
            'SubmitDocumentRq.DocumentInfo.DocType'        => 'required|string|in:KT,NPW,IN',
            'SubmitDocumentRq.DocumentInfo.DocContent'     => 'required|string|base64_encoded_content:jpg,jpeg',
            'SubmitDocumentRq.DocumentInfo.DocContentType' => 'required|string|in:image/jpeg',
        ];
    }

    /**
     * @inheritDoc
     */
    public function messages()
    {
        return [
            'SubmitDocumentRq.DocumentInfo.DocContent.url_base64_encoded_content'   => ':attribute harus berupa url sebuah gambar dengan ekstensi .jpg atau .jpeg.',
            'SubmitDocumentRq.DocumentInfo.DocContentType.url_encoded_content_type' => ':attribute harus berupa image/jpeg.',
        ];
    }

    /**
     * @inheritDoc
     */
    public function customAttributes()
    {
        return [
            'SubmitDocumentRq'                             => 'submit document request',
            'SubmitDocumentRq.MsgRqHdr'                    => 'header permintaan pesan',
            'SubmitDocumentRq.MsgRqHdr.RequestTimestamp'   => 'timestamp',
            'SubmitDocumentRq.MsgRqHdr.CustRefID'          => 'id referral pelanggan',
            'SubmitDocumentRq.DocumentInfo'                => 'info dokumen',
            'SubmitDocumentRq.DocumentInfo.BankReffId'     => 'id referral bank',
            'SubmitDocumentRq.DocumentInfo.DocType'        => 'jenis dokumen',
            'SubmitDocumentRq.DocumentInfo.DocContent'     => 'konten dokumen',
            'SubmitDocumentRq.DocumentInfo.DocContentType' => 'jenis konten dokumen',
        ];
    }
}

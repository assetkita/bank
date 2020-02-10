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

        $this->documentContent = urlencode($documentContent);

        $this->documentContentType = urlencode('image/jpeg');
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
            'SubmitDocumentRs' => [
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
            'SubmitDocumentRs'                             => 'required|array|size:2',
            'SubmitDocumentRs.MsgRqHdr'                    => 'required|array|size:2',
            'SubmitDocumentRs.MsgRqHdr.RequestTimestamp'   => 'required|string|date',
            'SubmitDocumentRs.MsgRqHdr.CustRefID'          => 'required|string|size:20',
            'SubmitDocumentRs.DocumentInfo'                => 'required|array|size:5',
            'SubmitDocumentRs.DocumentInfo.BankReffId'     => 'required|string',
            'SubmitDocumentRs.DocumentInfo.DocType'        => 'required|string|in:KT,NPW,IN',
            'SubmitDocumentRs.DocumentInfo.DocContent'     => 'required|string|url_base64_encoded_content:jpg,jpeg',
            'SubmitDocumentRs.DocumentInfo.DocContentType' => 'required|string|url_encoded_content_type:image/jpeg',
        ];
    }

    /**
     * @inheritDoc
     */
    public function messages()
    {
        return [
            'SubmitDocumentRs.DocumentInfo.DocContent.url_base64_encoded_content'   => ':attribute harus berupa url sebuah gambar dengan ekstensi .jpg atau .jpeg.',
            'SubmitDocumentRs.DocumentInfo.DocContentType.url_encoded_content_type' => ':attribute harus berupa image/jpeg.',
        ];
    }

    /**
     * @inheritDoc
     */
    public function customAttributes()
    {
        return [
            'SubmitDocumentRs'                             => 'submit document request',
            'SubmitDocumentRs.MsgRqHdr'                    => 'header permintaan pesan',
            'SubmitDocumentRs.MsgRqHdr.RequestTimestamp'   => 'timestamp',
            'SubmitDocumentRs.MsgRqHdr.CustRefID'          => 'id referral pelanggan',
            'SubmitDocumentRs.DocumentInfo'                => 'info dokumen',
            'SubmitDocumentRs.DocumentInfo.BankReffId'     => 'id referral bank',
            'SubmitDocumentRs.DocumentInfo.DocType'        => 'jenis dokumen',
            'SubmitDocumentRs.DocumentInfo.DocContent'     => 'konten dokumen',
            'SubmitDocumentRs.DocumentInfo.DocContentType' => 'jenis konten dokumen',
        ];
    }
}

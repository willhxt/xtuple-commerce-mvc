<?php
// Some basic configuration settings for XTC
define( 'SITE_DOMAIN', 'xtc-dev.local' );
define( 'PRODUCTS_PER_PAGE', '6' );
define( 'API_URL', 'https://willapi.xtuplecloud.com');
define( 'ERP_DATABASE', 'erp_demo');
define( 'USE_SSL', false);
define( 'USE_CART', true);

// Declare SSH keys

global $JWT_Private, $JWT_Public;

$JWT_Private = <<<EOD
-----BEGIN RSA PRIVATE KEY-----
MIIEpgIBAAKCAQEAouFcOgojyJ6rqmEEi+A/OjUvuPyiOFKahLOSBM0gCcULdW4P
cE1OQ9LMnZlaKPH8hushHhZM6QgEE8wpHjQKtsJyNmuBEorIJXJDiBOE7oFVzvgH
GrW1MM/e4FvqlHyNIhRuP+OisQnM39/OInG8OgeH7//wy03pQwAxh3yVh6P4I1bw
qj0/el4haRlsz79qKXVD4bym3UzoeY1YPXDwFhwXmC8wi0a+QwnFReaTn8Hb/AEr
MPwOPNrTuQRXST3GFxltPEYvS5rw9Fy9mv265PsPzzcrmvG9cMo3jBEO+GnvMVMB
UlvOAjrKzLRpKt9vbPAeBJ5A44JY3wUC9ut1AwIDAQABAoIBAQCSQi1PzMUfJCPg
JagwdlgwS4wj329Hhh1MZfcLqqpHO5Izi3X/kNtjmcm1Bvxn4guxlzewzbOYWWNX
569QeMjaHbbzWQuY+9gHkBhF+8kVZjwIUr4GZP5j63UmIEN/vGv7Gz94zU7NDJDU
wyJV2a18qkCN6VRvKvH4ARd4ow2estaPll2OTGUzeqCzDz0PfBUUNl/3thuakieR
mUbN35thIC4fNAc1+Dlq+edumqbNUuZvxT+rJI3Wz6xFoMXPps1qoSJTmudize5o
zGeuSghETRU/apLsfIHcfZ5gdg3CgBohjvvIPkzMrdbo4Vk78FI8Ofn8Lhietq5k
N1JLL6OZAoGBANDfptuAbp0z0R6zy8WFvvAZotIwn8VeiDJO8KlvZuhHfrdHkyMW
G1hh3ObBsQywBJVFtxkaRs6x5f15c5v3oFi78xGsYW+gJR3ZhsXIQ2+L6BxRgY8J
kBiFp31PeR1B1jH1XBIuyN0BpEMAej7Q9mcudIeOCUCXZx9niIPoS0/nAoGBAMeh
LS7FAaiYy3x17CLqjiqVejbaD2TkUHDp5n+KSMnc0vtMlcckdb1hnYtNBNAOxSEU
pQ0qwbhW73tHAP0pCwhL72GOxA/djOsgmbv4osisYJJ9b6bLdTxR6M+EYbKA60T9
Yz3qCxiF8CPqfEllkPEL/62YsOHF+ldsDjJn5z6FAoGBAJ7mVijMptne7qr9uvqU
SfKcfhqLNTDQPqqPFVTA1DfHFCZYRB5AFiOBp6zBE3EEgygQNj/Zlp5uBfp0J7gy
hQCcU0lRq3phCXuQ3Y+fT3YPqE/KzdZEPyP4obeZ+xh/2nR9JUML5nEDa7QxK86X
56wNUkdBjdZel+vzNo6q7IhnAoGBAIEllnNxZDdMUih8qX2VPM/z0BL4U4kz446I
42OTdK+TOrL0wtkIj1srcZ6S/xAS3hkeoAC6roSxSVD5iHw/NzHw3jbBA7o33Fio
yIxAuB8W1YsvtzGy4m9ZlkHaJNI0cQA65R9C8Fa3H7o8kpdxK6ml14zZAWWujNxN
vYmCiql5AoGBALbI+eCwHkpnjB76d91sHnM6hXqrQEy3j2zDPY0NtFmNDCQPFVXO
becZtTEKewErWWkcValqonS3BglMsFG/QPiByCAKlTWDki242N7JaTETwQPol9/g
i5YbIbBmyrkzmYISVG5WxKcRvdiA5X+/muJTpclahrNwMCCvaQMTNdNs
-----END RSA PRIVATE KEY-----
EOD;

$JWT_Public = <<<EOD
-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAouFcOgojyJ6rqmEEi+A/
OjUvuPyiOFKahLOSBM0gCcULdW4PcE1OQ9LMnZlaKPH8hushHhZM6QgEE8wpHjQK
tsJyNmuBEorIJXJDiBOE7oFVzvgHGrW1MM/e4FvqlHyNIhRuP+OisQnM39/OInG8
OgeH7//wy03pQwAxh3yVh6P4I1bwqj0/el4haRlsz79qKXVD4bym3UzoeY1YPXDw
FhwXmC8wi0a+QwnFReaTn8Hb/AErMPwOPNrTuQRXST3GFxltPEYvS5rw9Fy9mv26
5PsPzzcrmvG9cMo3jBEO+GnvMVMBUlvOAjrKzLRpKt9vbPAeBJ5A44JY3wUC9ut1
AwIDAQAB
-----END PUBLIC KEY-----
EOD;
?>

<?php

namespace Mediapark\AdvertisementBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="Advertisement", mappedBy="fos_user")
     */
    private $advertisements;

    public function __construct()
    {
        parent::__construct();

        $this->advertisements = new ArrayCollection();
    }

    /**
     * Add advertisement
     *
     * @param \Mediapark\AdvertisementBundle\Entity\Advertisement $advertisement
     *
     * @return User
     */
    public function addAdvertisement(\Mediapark\AdvertisementBundle\Entity\Advertisement $advertisement)
    {
        $this->advertisements[] = $advertisement;

        return $this;
    }

    /**
     * Remove advertisement
     *
     * @param \Mediapark\AdvertisementBundle\Entity\Advertisement $advertisement
     */
    public function removeAdvertisement(\Mediapark\AdvertisementBundle\Entity\Advertisement $advertisement)
    {
        $this->advertisements->removeElement($advertisement);
    }

    /**
     * Get advertisements
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAdvertisements()
    {
        return $this->advertisements;
    }
}

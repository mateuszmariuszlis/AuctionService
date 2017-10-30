<?php

namespace AppBundle\Twig;

class DateExtension extends \Twig_Extension
{

    /**
     * @return array
     */
    public function getFilters()
    {
        return [
            new \Twig_SimpleFilter("expireDate", [$this, "expireDate"])
        ];
    }

    public function expireDate(\DateTime $expiresAt)
    {
        $now = new \DateTime();
        $interval = $expiresAt->diff($now);

        if ($expiresAt > new \DateTime("+7 days")) {
            return $expiresAt->format("Y-m-d H:i");
        }

        if ($expiresAt > new \DateTime("+1 day")) {
            return " za " . $interval->format("%a dni");
        }

        return "za " . $interval->format("%h godz. %i min.");
    }

    /**
     * @param \DateTime $expiresAt
     * @return string
     */
    public function auctionStyle(\DateTime $expiresAt)
    {
        if ($expiresAt < new \DateTime("+1 day")){
            return "panel-danger";
        }

        return "panel-default";
    }
}
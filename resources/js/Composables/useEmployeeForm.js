import {useRemember} from "@inertiajs/vue3";

export function useEmployeeForm(){
    const personalInformationFormData = useRemember({
        firstName: '',
        middleName: '',
        lastName: '',
        gender: '',
        dateOfBirth: '',
        email: '',
        phoneNumber: '',
        streetAddress: '',
        municipality: '',
        cityOrProvince: '',
        postalCode: '',
    }, 'PersonalInformation');

    const personalInformationErrors = useRemember({
        firstName: [],
        middleName: [],
        lastName: [],
        gender: [],
        dateOfBirth: [],
        email: [],
        phoneNumber: [],
        streetAddress: [],
        municipality: [],
        cityOrProvince: [],
        postalCode: [],
    }, 'PersonalInformationErrors')

    const professionalInformationFormData = useRemember({
        joiningDate: '',
        department_id: '',
        position_id: '',
        team_id: '',
        ratePerHour: '',
        accessEmail: '',
        accessPassword: ''
    }, 'ProfessionalInformation')

    const accountAccessFormData = useRemember({
        accessEmail: '',
        accessPassword: ''
    }, 'AccountAccess');


    const generateAccessEmail = () => {
        const { firstName } = personalInformationFormData.value;
        return firstName ? firstName.toLowerCase() + "@hrms.com" : "";
    }

    const generateAccessPassword = () => {
        const {lastName, dateOfBirth} = personalInformationFormData.value;
        const birthdayData = dateOfBirth.split('-');
        return lastName && dateOfBirth ? lastName.toLowerCase().concat('.').concat(birthdayData.join('')) : "";
    }

    return {
        personalInformationFormData,
        professionalInformationFormData,
        accountAccessFormData,
        personalInformationErrors,
        generateAccessEmail,
        generateAccessPassword
    }

}

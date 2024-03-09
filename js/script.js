console.log("Helloo");
const iprcs = {
  Ngoma: {
    faculities: [
      "Ict",
      "CivilEgineering",
      "Hospitality",
      "MechanicalEngineering",
    ],
    Ict: ["Information Techinolgy"],
    CivilEgineering: ["Construction Technology", "Land Surveying"],
    Hospitality: [
      "Culinary Arts",
      "Food And Beverage Services",
      "Front Office Operations",
      "HouseKeeping Operations",
      "Room Division",
    ],
    MechanicalEngineering: [
      "Automobile Techinology",
      "Manufacturing Techinology",
    ],
  },

  Huye: {
    faculities: ["ICT", "cropProduction", "MechanicalEngineering"],
    cropProduction: [
      "Crop Processing",
      "Agriculture Mechanisation",
      "IRRIGATION TECHINOLOGY",
    ],
    MechanicalEngineering: ["Production And manufacturing"],
    ICT: ["Information Techinology"],
  },
  Musanze: {
    faculities: [
      "agricultureEngineerig",
      "civilEgineering",
      "ElectricalAndElectronicsEngineering",
    ],
    agricultureEngineerig: [
      "Crop Processing",
      "Irrigation And drainage Techinology",
      "food Processing",
    ],
    civilEgineering: [
      "constraction Techinology",
      "Capentry",
      "Masonary",
      "Welding",
      "Painting",
      "Tiling",
    ],
    ElectricalAndElectronicsEngineering: [
      "Electrical Techinology",
      "Electrical Automatio Techinology",
    ],
  },
  Karongi: {
    faculities: [
      "agricultureEngineerig",
      "HospitalityManagement",
      "ElectricalAndElectronicsEngineering",
    ],
    agricultureEngineerig: ["Horticulture Technology"],
    ElectricalAndElectronicsEngineering: ["Electrical Techinology"],
    HospitalityManagement: [
      "Culinary Arts",
      "Food And Beverage Services",
      "Front Office Operations",
      "HouseKeeping Operations",
    ],
  },
  Kitabi: {
    faculities: ["Tourism", "NatureConservation", "Forestry"],
    Tourism: ["Tourism and Desitination Management"],
    NatureConservation: ["Wild Life and cinservation Technologies"],
    Forestry: [
      "Forest resource management",
      "Forest engineering and wood Technology",
    ],
  },
  Tumba: {
    faculities: [
      "RenewableEnergydepertment",
      "InformationTechnology",
      "ElectronicsandTelcommunication",
    ],
    RenewableEnergydepertment: ["Rnewable Energy"],
    InformationTechnology: ["Information Technology"],
    ElectronicsandTelcommunication: ["Communication Technology"],
  },
  Kigali: {
    faculities: [
      "CivalEngineering",
      "ElectricalAndElectronicsEngineering",
      "CreativeArts",
    ],
    CivalEngineering: [
      "constraction Techinology",
      "Water And Sanitation Techinology",
      "Quantinty Surveying",
      "Land Serveying",
      "highwayEngineering",
    ],
    CreativeArts: [
      "fashiom design",
      "Film making Tv Production",
      "Graphic Design And Animation",
    ],
    ElectricalAndElectronicsEngineering: [
      "Electrica Technology",
      "Electronics and telcommunication",
      "Electro Mechanical Technology",
      "Biomedical Equipment Technology",
      "Mechatronic Technology",
    ],
  },
};

let inst = document.querySelector("#insititute");
inst.addEventListener("change", populate);

function populate(e) {
  const deprtment = document.querySelector("#departiment");
  inst.children[0].disabled = "disabled";
  while (document.querySelector("#departiment").children[1]) {
    document.querySelector("#departiment").children[1].remove();
  }

  const depList = iprcs[inst.value].faculities;
  depList.forEach(function (list) {
    const opt = document.createElement("option");
    opt.value = list;
    opt.textContent = list;
    document.querySelector("#departiment").appendChild(opt);
  });
  deprtment.addEventListener("change", faculities);
  const instituteChoice = inst.value;
  function faculities() {
    while (document.querySelector(".faculity").children[1]) {
      document.querySelector(".faculity").children[1].remove();
    }
    const depChoice = deprtment.value;
    facLists = iprcs[instituteChoice][depChoice];
    facLists.forEach(function (lists) {
      const op = document.createElement("option");
      op.value = lists;
      op.textContent = lists;
      document.querySelector(".faculity").appendChild(op);
    });
  }
  e.preventDefault();
}

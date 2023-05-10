import { Container, Row, Col, Tab, Nav } from "react-bootstrap";
import { ProjectCard } from "./ProjectCard";
import projImg1 from "../assets/img/project-img1.jpg";
import projImg2 from "../assets/img/project-img2.jpg";
import projImg3 from "../assets/img/project-img3.jpg";
import colorSharp2 from "../assets/img/color-sharp2.png";
import 'animate.css';
import TrackVisibility from 'react-on-screen';

export const Projects = () => {

  const projects = [
    {
      title: "Follow Traffic Rules, Save your life",
      description: "-Hamro Traffic",
      imgUrl: projImg1,
    },
    {
      title: "Follow instruction",
      description: "-Hamro Traffic",
      imgUrl: projImg2,
    },
    {
      title: "If you drive like hell, you will go there only",
      description: "-Hamro Traffic",
      imgUrl: projImg3,
    },
    {
      title: "Follow Traffic Rules, Save Your life",
      description: "-Hamro Traffic",
      imgUrl: projImg1,
    },
    {
      title: "Follow instruction",
      description: "-Hamro Traffic",
      imgUrl: projImg2,
    },
    {
      title: "If you drive like hell, you will go there only",
      description: "-Hamro Traffic",
      imgUrl: projImg3,
    },
  ];

  return (
    <section className="project" id="project">
      <Container>
        <Row>
          <Col size={12}>
            <TrackVisibility>
              {({ isVisible }) =>
              <div className={isVisible ? "animate__animated animate__fadeIn": ""}>
                <h2>About Us</h2>
                <p>The company consist of 5 members. The role is divided into Project Manager,Business Analyst and developer
                Saurya Manandar as a Project Manager, Anish Khatiwada as a Business Analyst, Sagar Budathoki and Amrit Regmi Magar are as a Developer
                </p>
                <Tab.Container id="projects-tabs" defaultActiveKey="first">
                  <Nav variant="pills" className="nav-pills mb-5 justify-content-center align-items-center" id="pills-tab">
                    <Nav.Item>
                      <Nav.Link eventKey="first">Experienced</Nav.Link>
                    </Nav.Item>
                    <Nav.Item>
                      <Nav.Link eventKey="second">User Stories</Nav.Link>
                    </Nav.Item>
                    <Nav.Item>
                      <Nav.Link eventKey="third">Contact Us</Nav.Link>
                    </Nav.Item>
                  </Nav>
                  <Tab.Content id="slideInUp" className={isVisible ? "animate__animated animate__slideInUp" : ""}>
                    <Tab.Pane eventKey="first">
                      <Row>
                        {
                          projects.map((project, index) => {
                            return (
                              <ProjectCard
                                key={index}
                                {...project}
                                />
                            )
                          })
                        }
                      </Row>
                    </Tab.Pane>
                    <Tab.Pane eventKey="second">
                      <p>“During First year of my college, I used to be late sometimes in a class. 
                        I used to get out in time from home,but due to traffic load it was hard to
                         arrive on time and also cannot find perfect path. Now because of Hamro Traffic,
                          the problem has been solved...”<br></br> - Anish Khatiwada</p>
                      <p>
                      “When I was going out during staurday for playing cricket, I didnot noticed the traffic 
                      and I was not able to reach at time. It was very frustuating and disappointing. Now I am 
                      using Hamro Traffic system, I can see the traffic load in different location and make decision.
                       I am very very happy now...” - Hemant Bam
                      </p>
                      
                    </Tab.Pane>
                    <Tab.Pane eventKey="third">
                         <p>Saurya Manandhar  - s.manandar@hamrotraffic.com<br></br>
                         Anish Khatiwada - anishkhatioda@gmail.com<br></br>
                         Amrit Regmi Magar - amrit.regmi@hamrotraffic.com<br></br>
                         Sagar Budhathoki  - sagar.budathoki@hamrotraffic.com<br></br>
                         Naxal,Herald College Kathmandu<br></br>
                         +977 98060*****
                         </p>
                    </Tab.Pane>
                  </Tab.Content>
                </Tab.Container>
              </div>}
            </TrackVisibility>
          </Col>
        </Row>
      </Container>
      <img className="background-image-right" src={colorSharp2}></img>
    </section>
  )
}
